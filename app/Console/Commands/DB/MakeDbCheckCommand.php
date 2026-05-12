<?php

namespace App\Console\Commands\DB;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class MakeDbCheckCommand extends Command
{
    protected $name = 'make:db-check';
    protected $description = 'Database diagnostics before starting generators';

    protected array $excludeTables = [
        'migrations',
        'password_reset_tokens',
        'sessions',
        'failed_jobs',
        'cache',
        'cache_locks',
        'jobs',
        'job_batches',
        'personal_access_tokens',
    ];

    protected array $allowedDatabases = [
        // 'mysql',
        // 'pgsql',
    ];

    protected array $outputPaths = [
        'Migrations' => 'database/migrations',
        'Models' => 'app/Models',
        'Factories' => 'database/factories',
        'Seeders' => 'database/seeders',
        'Controllers' => 'app/Http/Controllers',
        'API Controllers' => 'app/Http/Controllers/API',
        'Requests' => 'app/Http/Requests',
        'API Requests' => 'app/Http/Requests/API',
        'Views' => 'resources/views',
    ];

    /** Кэш метаданных всех таблиц */
    private array $allTablesMeta = [];

    // ================================================================

    public function handle(): int
    {
        $this->newLine();
        $this->line('<fg=cyan;options=bold>╔══════════════════════════════════════════════════════════╗</>');
        $this->line('<fg=cyan;options=bold>║         make:db-check  —  диагностика перед генерацией   ║</>');
        $this->line('<fg=cyan;options=bold>╚══════════════════════════════════════════════════════════╝</>');
        $this->newLine();

        $connection = $this->option('connection') ?: config('database.default');

        $ok = true;
        $ok = $this->checkConnection($connection) && $ok;
        $ok = $this->checkAllowedDatabases($connection) && $ok;
        $ok = $this->checkPhpExtensions() && $ok;
        $ok = $this->checkLaravelVersion() && $ok;
        $ok = $this->listTables($connection) && $ok;

        // Загружаем мета один раз — используется в разделах 6 и 7
        $this->loadAllTablesMeta($connection);

        $ok = $this->checkRelations($connection) && $ok;
        $ok = $this->checkExistingFiles($connection) && $ok;
        $ok = $this->checkOutputPaths() && $ok;

        $this->newLine();

        if ($ok) {
            $this->line('<fg=green;options=bold>✔  Все проверки пройдены. Можно запускать генераторы.</>');
        } else {
            $this->line('<fg=yellow;options=bold>⚠  Есть предупреждения — проверьте вывод выше.</>');
        }

        $this->newLine();
        $this->line('<fg=white>Следующий шаг:</>');
        $this->line("  php artisan make:db-all --connection={$connection} --force");
        $this->newLine();

        return 0;
    }

    // ================================================================
    // 1. Подключение
    // ================================================================
    private function checkConnection(string $connection): bool
    {
        $this->section('1. Соединение с базой данных');

        $driver = config("database.connections.{$connection}.driver", '—');
        $host = config("database.connections.{$connection}.host", '—');
        $port = config("database.connections.{$connection}.port", '—');
        $database = config("database.connections.{$connection}.database", '—');
        $username = config("database.connections.{$connection}.username", '—');
        $charset = config("database.connections.{$connection}.charset", '—');

        $this->row('Соединение', $connection);
        $this->row('Драйвер', $driver);
        $this->row('Хост', $host);
        $this->row('Порт', $port);
        $this->row('База', $database);
        $this->row('Пользователь', $username);
        $this->row('Кодировка', $charset);

        try {
            DB::connection($connection)->getPdo();
            $version = DB::connection($connection)
                ->select('SELECT VERSION() as v')[0]->v ?? '?';
            $this->row('Статус', '<fg=green>✔ Подключено</>');
            $this->row('Версия сервера', $version);
            $this->newLine();
            return true;
        } catch (\Throwable $e) {
            $this->row('Статус', '<fg=red>✘ Ошибка: ' . $e->getMessage() . '</>');
            $this->newLine();
            return false;
        }
    }

    // ================================================================
    // 2. allowedDatabases
    // ================================================================
    private function checkAllowedDatabases(string $connection): bool
    {
        $this->section('2. Список разрешённых соединений (allowedDatabases)');

        if (empty($this->allowedDatabases)) {
            $this->line('  <fg=yellow>Массив пуст — разрешены любые соединения.</>');
            $this->newLine();
            return true;
        }

        $this->line('  Разрешены: ' . implode(', ', $this->allowedDatabases));

        if (!in_array($connection, $this->allowedDatabases)) {
            $this->line("  <fg=red>✘ Текущее соединение «{$connection}» не входит в список!</>");
            $this->newLine();
            return false;
        }

        $this->line("  <fg=green>✔ Соединение «{$connection}» разрешено.</>");
        $this->newLine();
        return true;
    }

    // ================================================================
    // 3. PHP-расширения
    // ================================================================
    private function checkPhpExtensions(): bool
    {
        $this->section('3. PHP и расширения');

        $this->row('PHP версия', PHP_VERSION);
        $this->row('PHP путь', PHP_BINARY);

        $required = ['pdo', 'pdo_mysql', 'mbstring', 'json', 'openssl', 'tokenizer', 'xml', 'ctype'];
        $allOk = true;

        foreach ($required as $ext) {
            $loaded = extension_loaded($ext);
            $this->row(
                "ext-{$ext}",
                $loaded ? '<fg=green>✔ загружено</>' : '<fg=red>✘ ОТСУТСТВУЕТ</>'
            );
            if (!$loaded) $allOk = false;
        }

        $this->newLine();
        return $allOk;
    }

    // ================================================================
    // 4. Версия Laravel
    // ================================================================
    private function checkLaravelVersion(): bool
    {
        $this->section('4. Версия Laravel');

        $version = app()->version();
        $major = (int)explode('.', $version)[0];

        $this->row('Laravel', $version);
        $this->row('Совместимость', $major >= 10
            ? '<fg=green>✔ OK</>'
            : '<fg=red>✘ Требуется Laravel 10+</>'
        );

        $this->newLine();
        return $major >= 10;
    }

    // ================================================================
    // 5. Таблицы в БД
    // ================================================================
    private function listTables(string $connection): bool
    {
        $this->section('5. Таблицы в базе данных');

        try {
            $raw = DB::connection($connection)->select('SHOW TABLES');
        } catch (\Throwable $e) {
            $this->line('  <fg=red>✘ Не удалось получить список таблиц: ' . $e->getMessage() . '</>');
            $this->newLine();
            return false;
        }

        if (empty($raw)) {
            $this->line('  <fg=yellow>База данных пуста — таблиц нет.</>');
            $this->newLine();
            return true;
        }

        $allTables = array_map(fn($r) => array_values((array)$r)[0], $raw);
        $generatable = array_filter($allTables, fn($t) => !in_array($t, $this->excludeTables));
        $excluded = array_filter($allTables, fn($t) => in_array($t, $this->excludeTables));

        $this->line('  Всего таблиц:     <fg=white;options=bold>' . count($allTables) . '</>');
        $this->line('  Будут обработаны: <fg=green;options=bold>' . count($generatable) . '</>');
        $this->line('  Пропускаются:     <fg=yellow;options=bold>' . count($excluded) . '</>');
        $this->newLine();

        $this->line('  <options=bold>Таблицы для генерации:</>');
        foreach ($generatable as $table) {
            try {
                $cols = DB::connection($connection)->getSchemaBuilder()->getColumns($table);
                $fks = DB::connection($connection)->getSchemaBuilder()->getForeignKeys($table);
                $idx = DB::connection($connection)->getSchemaBuilder()->getIndexes($table);
                $count = DB::connection($connection)->table($table)->count();

                $this->line(sprintf(
                    '    <fg=green>►</> %-35s  колонок: <fg=white>%2d</>  FK: <fg=cyan>%d</>  индексов: <fg=cyan>%d</>  строк: <fg=yellow>%s</>',
                    $table, count($cols), count($fks), count($idx), number_format($count)
                ));
            } catch (\Throwable) {
                $this->line("    <fg=green>►</> {$table}  <fg=red>(ошибка чтения метаданных)</>");
            }
        }

        $this->newLine();

        if (!empty($excluded)) {
            $this->line('  <options=bold>Пропускаемые таблицы (excludeTables):</>');
            foreach ($excluded as $table) {
                $this->line("    <fg=yellow>—</> {$table}");
            }
            $this->newLine();
        }

        return true;
    }

    // ================================================================
    // 6. СВЯЗИ МЕЖДУ ТАБЛИЦАМИ  ← новый раздел
    // ================================================================
    private function checkRelations(string $connection): bool
    {
        $this->section('6. Связи между таблицами (будут сгенерированы в моделях)');

        $allTables = array_keys($this->allTablesMeta);
        $generatable = array_filter($allTables, fn($t) => !in_array($t, $this->excludeTables));

        if (empty($generatable)) {
            $this->line('  <fg=yellow>Нет таблиц для анализа.</>');
            $this->newLine();
            return true;
        }

        $totalRelations = 0;
        $pivotTables = $this->detectAllPivotTables();

        foreach ($generatable as $table) {
            $model = $this->modelName($table);
            $ownFKs = $this->allTablesMeta[$table]['foreignKeys'] ?? [];
            $relations = [];

            // --- belongsTo ---
            foreach ($ownFKs as $fk) {
                $foreignTable = $fk['foreign_table'] ?? '';
                $localCol = $fk['columns'][0] ?? '';
                $foreignCol = $fk['foreign_columns'][0] ?? 'id';
                $relModel = $this->modelName($foreignTable);
                $method = Str::camel(
                    Str::singular(str_replace('_id', '', $localCol)) ?: Str::singular($foreignTable)
                );
                $relations[] = [
                    'type' => 'belongsTo',
                    'color' => 'magenta',
                    'method' => $method . '()',
                    'related' => $relModel,
                    'detail' => "{$table}.{$localCol} → {$foreignTable}.{$foreignCol}",
                ];
            }

            // --- hasOne / hasMany ---
            foreach ($this->allTablesMeta as $otherTable => $meta) {
                if ($otherTable === $table) continue;
                if (in_array($otherTable, $pivotTables)) continue;
                if (in_array($otherTable, $this->excludeTables)) continue;

                foreach ($meta['foreignKeys'] as $fk) {
                    if (($fk['foreign_table'] ?? '') !== $table) continue;

                    $localCol = $fk['columns'][0] ?? '';
                    $foreignCol = $fk['foreign_columns'][0] ?? 'id';
                    $relModel = $this->modelName($otherTable);
                    $isUnique = $this->columnHasUniqueIndex($otherTable, $localCol);

                    if ($isUnique) {
                        $method = Str::camel(Str::singular($otherTable));
                        $type = 'hasOne';
                        $color = 'blue';
                    } else {
                        $method = Str::camel(Str::plural($otherTable));
                        $type = 'hasMany';
                        $color = 'green';
                    }

                    $relations[] = [
                        'type' => $type,
                        'color' => $color,
                        'method' => $method . '()',
                        'related' => $relModel,
                        'detail' => "{$otherTable}.{$localCol} → {$table}.{$foreignCol}",
                    ];
                }
            }

            // --- belongsToMany ---
            foreach ($pivotTables as $pivotTable) {
                $pivotFKs = $this->allTablesMeta[$pivotTable]['foreignKeys'] ?? [];

                $fkToMe = null;
                $fkToOther = null;

                foreach ($pivotFKs as $fk) {
                    if ($fk['foreign_table'] === $table) $fkToMe = $fk;
                    else                                  $fkToOther = $fk;
                }

                if (!$fkToMe || !$fkToOther) continue;
                if (in_array($fkToOther['foreign_table'], $this->excludeTables)) continue;

                $otherTable = $fkToOther['foreign_table'];
                $relModel = $this->modelName($otherTable);
                $method = Str::camel(Str::plural($otherTable));
                $localKey = $fkToMe['columns'][0] ?? '';
                $foreignKey = $fkToOther['columns'][0] ?? '';

                $relations[] = [
                    'type' => 'belongsToMany',
                    'color' => 'yellow',
                    'method' => $method . '()',
                    'related' => $relModel,
                    'detail' => "через {$pivotTable} ({$localKey} ↔ {$foreignKey})",
                ];
            }

            // --- Вывод ---
            if (empty($relations)) {
                $this->line(sprintf(
                    '  <fg=white;options=bold>%-20s</> <fg=gray>нет связей</>',
                    $model
                ));
            } else {
                $this->line(sprintf(
                    '  <fg=white;options=bold>%-20s</> <fg=gray>(%d связей)</>',
                    $model, count($relations)
                ));

                foreach ($relations as $rel) {
                    $badge = match ($rel['type']) {
                        'belongsTo' => '<fg=magenta>  belongsTo    </>',
                        'hasOne' => '<fg=blue>  hasOne       </>',
                        'hasMany' => '<fg=green>  hasMany      </>',
                        'belongsToMany' => '<fg=yellow>  belongsToMany</>',
                        default => '  ' . $rel['type'],
                    };

                    $this->line(sprintf(
                        '    %s  <fg=white>%-28s</>  → <fg=cyan>%s</>  <fg=gray>%s</>',
                        $badge,
                        $rel['method'],
                        $rel['related'],
                        $rel['detail']
                    ));

                    $totalRelations++;
                }
            }
        }

        // --- Сводка pivot-таблиц ---
        if (!empty($pivotTables)) {
            $this->newLine();
            $this->line('  <options=bold>Обнаруженные pivot-таблицы (belongsToMany):</>');
            foreach ($pivotTables as $pt) {
                $fks = $this->allTablesMeta[$pt]['foreignKeys'] ?? [];
                $tables = implode(' ↔ ', array_column($fks, 'foreign_table'));
                $this->line("    <fg=yellow>◈</> {$pt}  <fg=gray>({$tables})</>");
            }
        }

        $this->newLine();
        $this->line("  Итого связей к генерации: <fg=white;options=bold>{$totalRelations}</>");
        $this->newLine();

        return true;
    }

    // ================================================================
    // 7. Конфликты файлов
    // ================================================================
    private function checkExistingFiles(string $connection): bool
    {
        $this->section('7. Конфликты: уже существующие файлы');

        $allTables = array_keys($this->allTablesMeta);
        $generatable = array_filter($allTables, fn($t) => !in_array($t, $this->excludeTables));
        $conflicts = [];

        foreach ($generatable as $table) {
            $model = $this->modelName($table);
            $snake = Str::snake(Str::plural($model));

            $checks = [
                'Model' => app_path("Models/{$model}.php"),
                'Factory' => database_path("factories/{$model}Factory.php"),
                'Seeder' => database_path("seeders/{$model}Seeder.php"),
                'Controller' => app_path("Http/Controllers/{$model}Controller.php"),
                'APIController' => app_path("Http/Controllers/API/{$model}APIController.php"),
                'CreateRequest' => app_path("Http/Requests/Create{$model}Request.php"),
                'UpdateRequest' => app_path("Http/Requests/Update{$model}Request.php"),
                'Views/index' => resource_path("views/{$snake}/index.blade.php"),
            ];

            foreach ($checks as $label => $path) {
                if (file_exists($path)) {
                    $conflicts[] = [$table, $label, $path];
                }
            }
        }

        if (empty($conflicts)) {
            $this->line('  <fg=green>✔ Конфликтов нет — все файлы будут созданы впервые.</>');
        } else {
            $this->line("  <fg=yellow>⚠ Найдено конфликтов: " . count($conflicts) . ". При запуске с --force будут перезаписаны:</>");
            foreach ($conflicts as [$table, $label, $path]) {
                $rel = str_replace(base_path() . '/', '', $path);
                $this->line("    <fg=yellow>▲</> {$table}  →  {$label}  →  <fg=white>{$rel}</>");
            }
        }

        $this->newLine();
        return true;
    }

    // ================================================================
    // 8. Права на запись
    // ================================================================
    private function checkOutputPaths(): bool
    {
        $this->section('8. Выходные папки (права на запись)');

        $allOk = true;

        foreach ($this->outputPaths as $label => $relative) {
            $full = base_path($relative);
            $exists = is_dir($full);
            $writable = $exists && is_writable($full);

            if (!$exists) {
                $this->line(sprintf(
                    '  <fg=yellow>—</> %-22s  %s  <fg=yellow>(будет создана)</>',
                    $label, $relative
                ));
            } elseif (!$writable) {
                $this->line(sprintf(
                    '  <fg=red>✘</> %-22s  %s  <fg=red>НЕТ ПРАВ НА ЗАПИСЬ</>',
                    $label, $relative
                ));
                $allOk = false;
            } else {
                $this->line(sprintf(
                    '  <fg=green>✔</> %-22s  %s',
                    $label, $relative
                ));
            }
        }

        $this->newLine();
        return $allOk;
    }

    // ================================================================
    // Загрузка метаданных всех таблиц
    // ================================================================
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
                    'indexes' => DB::connection($connection)->getSchemaBuilder()->getIndexes($table),
                ];
            } catch (\Throwable) {
                $this->allTablesMeta[$table] = ['columns' => [], 'foreignKeys' => [], 'indexes' => []];
            }
        }
    }

    // ================================================================
    // Вспомогательные методы
    // ================================================================

    private function detectAllPivotTables(): array
    {
        $pivots = [];
        foreach ($this->allTablesMeta as $table => $meta) {
            if (count($meta['foreignKeys']) !== 2) continue;

            $fkColumns = array_merge(...array_column($meta['foreignKeys'], 'columns'));
            $skipNames = array_merge($fkColumns, ['id', 'created_at', 'updated_at', 'deleted_at']);
            $extraCols = array_filter($meta['columns'], fn($c) => !in_array($c['name'], $skipNames));

            if (count($extraCols) === 0) {
                $pivots[] = $table;
            }
        }
        return $pivots;
    }

    private function columnHasUniqueIndex(string $table, string $column): bool
    {
        $indexes = $this->allTablesMeta[$table]['indexes'] ?? [];
        foreach ($indexes as $index) {
            if ($index['unique'] && in_array($column, $index['columns'])) {
                return true;
            }
        }
        return false;
    }

    private function modelName(string $table): string
    {
        return Str::studly(Str::singular($table));
    }

    private function section(string $title): void
    {
        $this->line("<fg=cyan;options=bold>── {$title} ──────────────────────────────────────────</>");
    }

    private function row(string $label, string $value): void
    {
        $this->line(sprintf('  %-22s  %s', $label . ':', $value));
    }

    public function getOptions(): array
    {
        return [
            ['connection', null, InputOption::VALUE_OPTIONAL, 'Database connection name'],
        ];
    }
}
