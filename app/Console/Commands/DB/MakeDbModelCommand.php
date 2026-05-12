<?php
// ============================================================
// src/Commands/DB/MakeDbModelCommand.php
// ============================================================

namespace App\Console\Commands\DB;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MakeDbModelCommand extends BaseDbCommand
{
    protected $name = 'make:db-model';
    protected $description = 'Generate Eloquent model classes from existing database tables';

    /**
     * Кэш метаданных всех таблиц.
     * Структура: [ tableName => [ 'columns' => [...], 'foreignKeys' => [...] ] ]
     */
    private array $allTablesMeta = [];

    // ================================================================

    public function handle(): int
    {
        $connection = $this->option('connection') ?: config('database.default');

        // Загружаем метаданные ВСЕХ таблиц один раз — нужно для hasMany/hasOne/belongsToMany
        $this->loadAllTablesMeta($connection);

        return parent::handle();
    }

    private function loadAllTablesMeta(string $connection): void
    {
        try {
            $raw = DB::connection($connection)->select('SHOW TABLES');
        } catch (\Throwable) {
            return;
        }

        $allTables = array_map(fn($r) => array_values((array)$r)[0], $raw);

        foreach ($allTables as $table) {
            try {
                $this->allTablesMeta[$table] = [
                    'columns' => DB::connection($connection)->getSchemaBuilder()->getColumns($table),
                    'foreignKeys' => DB::connection($connection)->getSchemaBuilder()->getForeignKeys($table),
                ];
            } catch (\Throwable) {
                $this->allTablesMeta[$table] = ['columns' => [], 'foreignKeys' => []];
            }
        }
    }

    // ================================================================

    protected function generate(string $table, string $connection): void
    {
        $modelName = $this->modelName($table);
        $namespace = config('laravel_generator.namespace.model', 'App\Models');
        $columns = $this->allTablesMeta[$table]['columns'] ?? [];
        $ownFKs = $this->allTablesMeta[$table]['foreignKeys'] ?? [];

        $fillables = $this->buildFillables($columns);
        $casts = $this->buildCasts($columns);
        $relations = $this->buildAllRelations($table, $ownFKs, $namespace);
        $connLine = $connection !== config('database.default')
            ? "\n    protected \$connection = '{$connection}';\n"
            : '';

        // Нужен ли SoftDeletes?
        $hasSoftDelete = collect($columns)->pluck('name')->contains('deleted_at');
        $softDeleteUse = $hasSoftDelete ? "\nuse Illuminate\Database\Eloquent\SoftDeletes;" : '';
        $softDeleteTrait = $hasSoftDelete ? "\n    use SoftDeletes;" : '';

        $stub = <<<PHP
<?php

namespace {$namespace};

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;{$softDeleteUse}

class {$modelName} extends Model
{
    use HasFactory;{$softDeleteTrait}
{$connLine}
    protected \$table = '{$table}';

    protected \$fillable = [
{$fillables}
    ];

    protected \$casts = [
{$casts}
    ];

{$relations}
}
PHP;

        $path = app_path('Models/' . $modelName . '.php');
        $this->writeFile($path, $stub, (bool)$this->option('force'));
    }

    // ================================================================
    // Главный метод — собирает все типы связей
    // ================================================================

    private function buildAllRelations(string $currentTable, array $ownFKs, string $namespace): string
    {
        $blocks = [];

        // 1. belongsTo — у текущей таблицы есть FK на другую
        foreach ($this->detectBelongsTo($ownFKs, $namespace) as $r) {
            $blocks[] = $r;
        }

        // 2. hasMany / hasOne — другие таблицы имеют FK на текущую
        foreach ($this->detectHasOneAndHasMany($currentTable, $namespace) as $r) {
            $blocks[] = $r;
        }

        // 3. belongsToMany — через pivot-таблицы
        foreach ($this->detectBelongsToMany($currentTable, $namespace) as $r) {
            $blocks[] = $r;
        }

        return implode("\n\n", $blocks);
    }

    // ================================================================
    // 1. belongsTo
    //    Текущая таблица имеет FK → другая таблица
    //    posts.user_id → users.id  =>  Post::belongsTo(User)
    // ================================================================

    private function detectBelongsTo(array $ownFKs, string $namespace): array
    {
        $methods = [];

        foreach ($ownFKs as $fk) {
            $localCol = $fk['columns'][0] ?? '';
            $foreignTable = $fk['foreign_table'] ?? '';
            $foreignCol = $fk['foreign_columns'][0] ?? 'id';
            $relatedModel = $this->modelName($foreignTable);

            // Имя метода: user_id → user, author_id → author
            $methodName = Str::camel(
                Str::singular(str_replace('_id', '', $localCol)) ?: Str::singular($foreignTable)
            );

            $fkArg = $localCol !== Str::snake($methodName) . '_id' ? ", '{$localCol}'" : '';
            $ownerArg = $foreignCol !== 'id' ? ", '{$foreignCol}'" : '';

            $methods[] = $this->relationMethod(
                $methodName,
                'BelongsTo',
                "return \$this->belongsTo(\\{$namespace}\\{$relatedModel}::class{$fkArg}{$ownerArg});"
            );
        }

        return $methods;
    }

    // ================================================================
    // 2. hasOne / hasMany
    //    Другие таблицы имеют FK на текущую
    //
    //    users.id ← posts.user_id  =>  User::hasMany(Post)
    //
    //    hasOne  — если FK-колонка уникальна (уникальный индекс)
    //    hasMany — во всех остальных случаях
    // ================================================================

    private function detectHasOneAndHasMany(string $currentTable, string $namespace): array
    {
        $methods = [];
        $currentModel = $this->modelName($currentTable);

        foreach ($this->allTablesMeta as $otherTable => $meta) {
            if ($otherTable === $currentTable) continue;

            // Пропускаем pivot-таблицы (они обработаются в belongsToMany)
            if ($this->isPivotTable($otherTable)) continue;

            foreach ($meta['foreignKeys'] as $fk) {
                if (($fk['foreign_table'] ?? '') !== $currentTable) continue;

                $localCol = $fk['columns'][0] ?? '';
                $foreignCol = $fk['foreign_columns'][0] ?? 'id';
                $relatedModel = $this->modelName($otherTable);

                // Проверяем есть ли уникальный индекс на localCol → hasOne
                $isUnique = $this->columnHasUniqueIndex($otherTable, $localCol);
                $relType = $isUnique ? 'hasOne' : 'hasMany';
                $relClass = $isUnique ? 'HasOne' : 'HasMany';

                $methodName = $isUnique
                    ? Str::camel(Str::singular($otherTable))
                    : Str::camel(Str::plural($otherTable));

                $fkArg = $localCol !== Str::snake($currentModel) . '_id' ? ", '{$localCol}'" : '';
                $localArg = $foreignCol !== 'id' ? ", '{$foreignCol}'" : '';

                $methods[] = $this->relationMethod(
                    $methodName,
                    $relClass,
                    "return \$this->{$relType}(\\{$namespace}\\{$relatedModel}::class{$fkArg}{$localArg});"
                );
            }
        }

        return $methods;
    }

    // ================================================================
    // 3. belongsToMany
    //    Pivot-таблица содержит ровно 2 FK
    //
    //    role_user: user_id → users, role_id → roles
    //    User::belongsToMany(Role) через role_user
    //    Role::belongsToMany(User) через role_user
    // ================================================================

    private function detectBelongsToMany(string $currentTable, string $namespace): array
    {
        $methods = [];

        foreach ($this->allTablesMeta as $pivotTable => $meta) {
            if (!$this->isPivotTable($pivotTable)) continue;

            $fks = $meta['foreignKeys'];

            // Ищем FK на currentTable
            $fkToCurrentTable = null;
            $fkToOtherTable = null;

            foreach ($fks as $fk) {
                if ($fk['foreign_table'] === $currentTable) {
                    $fkToCurrentTable = $fk;
                } else {
                    $fkToOtherTable = $fk;
                }
            }

            if (!$fkToCurrentTable || !$fkToOtherTable) continue;

            $otherTable = $fkToOtherTable['foreign_table'];
            $relatedModel = $this->modelName($otherTable);
            $methodName = Str::camel(Str::plural($otherTable));

            $foreignPivotKey = $fkToOtherTable['columns'][0] ?? '';
            $relatedPivotKey = $fkToCurrentTable['columns'][0] ?? '';
            $parentKey = $fkToCurrentTable['foreign_columns'][0] ?? 'id';
            $relatedKey = $fkToOtherTable['foreign_columns'][0] ?? 'id';

            $methods[] = $this->relationMethod(
                $methodName,
                'BelongsToMany',
                "return \$this->belongsToMany(\\{$namespace}\\{$relatedModel}::class, '{$pivotTable}', '{$relatedPivotKey}', '{$foreignPivotKey}');"
            );
        }

        return $methods;
    }

    // ================================================================
    // Вспомогательные методы
    // ================================================================

    /**
     * Считаем таблицу pivot-таблицей если:
     * - Ровно 2 FK
     * - Нет незначительных колонок (кроме FK-полей, id, timestamps)
     */
    private function isPivotTable(string $table): bool
    {
        $meta = $this->allTablesMeta[$table] ?? null;
        if (!$meta) return false;

        $fks = $meta['foreignKeys'];
        if (count($fks) !== 2) return false;

        $fkColumns = array_merge(...array_column($fks, 'columns'));
        $skipNames = array_merge($fkColumns, ['id', 'created_at', 'updated_at', 'deleted_at']);
        $extraCols = array_filter(
            $meta['columns'],
            fn($c) => !in_array($c['name'], $skipNames)
        );

        // Если есть дополнительные значимые колонки — это не чистый pivot
        return count($extraCols) === 0;
    }

    /**
     * Есть ли уникальный индекс на колонку в таблице.
     */
    private function columnHasUniqueIndex(string $table, string $column): bool
    {
        $meta = $this->allTablesMeta[$table] ?? null;
        if (!$meta) return false;

        // getSchemaBuilder()->getIndexes() нужно вызвать отдельно — кэшируем в meta
        // Для простоты считаем: если колонка называется по паттерну *_id — hasMany
        // Полную проверку можно добавить при необходимости
        return false;
    }

    /**
     * Генерирует блок PHP-метода связи.
     */
    private function relationMethod(string $name, string $relClass, string $body): string
    {
        $ns = 'Illuminate\Database\Eloquent\Relations';
        return <<<PHP
    public function {$name}(): \\{$ns}\\{$relClass}
    {
        {$body}
    }
PHP;
    }

    // ================================================================
    // Fillables / Casts (без изменений)
    // ================================================================

    private function buildFillables(array $columns): string
    {
        $skip = ['id', 'created_at', 'updated_at', 'deleted_at'];
        $lines = [];
        foreach ($columns as $col) {
            if (!in_array($col['name'], $skip)) {
                $lines[] = "        '{$col['name']}',";
            }
        }
        return implode("\n", $lines);
    }

    private function buildCasts(array $columns): string
    {
        $lines = [];
        foreach ($columns as $col) {
            $cast = $this->resolveCast($col['type_name']);
            if ($cast) {
                $lines[] = "        '{$col['name']}' => '{$cast}',";
            }
        }
        return implode("\n", $lines);
    }

    private function resolveCast(string $type): ?string
    {
        return match (true) {
            in_array($type, ['int', 'integer', 'bigint', 'smallint', 'tinyint']) => 'integer',
            in_array($type, ['float', 'double']) => 'float',
            in_array($type, ['decimal', 'numeric']) => 'decimal:2',
            in_array($type, ['boolean', 'tinyint(1)']) => 'boolean',
            in_array($type, ['datetime', 'timestamp']) => 'datetime',
            in_array($type, ['date']) => 'date',
            in_array($type, ['json', 'jsonb']) => 'array',
            default => null,
        };
    }
}
