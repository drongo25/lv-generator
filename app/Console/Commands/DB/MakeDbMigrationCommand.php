<?php

// ============================================================
// src/Commands/DB/MakeDbMigrationCommand.php
// ============================================================
namespace App\Console\Commands\DB;
//namespace InfyOm\Generator\Commands\DB;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MakeDbMigrationCommand extends BaseDbCommand
{
    protected $name        = 'make:db-migration';
    protected $description = 'Generate migration files from existing database tables';

    protected function generate(string $table, string $connection): void
    {
        $columns     = DB::connection($connection)->getSchemaBuilder()->getColumns($table);
        $indexes     = DB::connection($connection)->getSchemaBuilder()->getIndexes($table);
        $foreignKeys = DB::connection($connection)->getSchemaBuilder()->getForeignKeys($table);

        $fields = $this->buildMigrationFields($columns, $indexes, $foreignKeys);

        $stub = <<<PHP
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('{$table}', function (Blueprint \$table) {
{$fields}
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('{$table}');
    }
};
PHP;

        $fileName = date('Y_m_d_His') . "_create_{$table}_table.php";
        $path     = database_path("migrations/{$fileName}");

        $this->writeFile($path, $stub, (bool) $this->option('force'));
    }

    private function buildMigrationFields(array $columns, array $indexes, array $foreignKeys): string
    {
        $fkLocal = array_column($foreignKeys, 'columns');
        $fkLocal = array_merge(...($fkLocal ?: [[]]));

        $lines = [];

        foreach ($columns as $col) {
            $name    = $col['name'];
            $type    = $col['type_name'];
            $notNull = !$col['nullable'];
            $default = $col['default'];
            $auto    = $col['auto_increment'] ?? false;

            if ($name === 'id' && $auto) {
                $lines[] = "            \$table->id();";
                continue;
            }

            if (in_array($name, ['created_at', 'updated_at'])) {
                continue; // добавим $table->timestamps() ниже
            }

            if ($name === 'deleted_at') {
                $lines[] = "            \$table->softDeletes();";
                continue;
            }

            $line = "            \$table->" . $this->mapType($type, $col) . "('{$name}')";

            if (!$notNull)        $line .= '->nullable()';
            if ($default !== null) $line .= "->default(" . $this->formatDefault($default, $type) . ")";
            if (in_array($name, $fkLocal)) $line .= '->unsigned()';

            $line .= ';';
            $lines[] = $line;
        }

        $lines[] = "            \$table->timestamps();";

        // Foreign keys
        foreach ($foreignKeys as $fk) {
            $local   = $fk['columns'][0] ?? '';
            $foreign = $fk['foreign_columns'][0] ?? 'id';
            $refTable = $fk['foreign_table'] ?? '';
            $lines[] = "            \$table->foreign('{$local}')->references('{$foreign}')->on('{$refTable}')->onDelete('cascade');";
        }

        return implode("\n", $lines);
    }

    private function mapType(string $type, array $col): string
    {
        return match (true) {
            in_array($type, ['bigint'])               => 'unsignedBigInteger',
            in_array($type, ['int', 'integer'])       => 'integer',
            in_array($type, ['smallint'])             => 'smallInteger',
            in_array($type, ['tinyint'])              => 'tinyInteger',
            in_array($type, ['varchar', 'char'])      => 'string',
            in_array($type, ['text'])                 => 'text',
            in_array($type, ['mediumtext'])           => 'mediumText',
            in_array($type, ['longtext'])             => 'longText',
            in_array($type, ['decimal', 'numeric'])   => 'decimal',
            in_array($type, ['float'])                => 'float',
            in_array($type, ['double'])               => 'double',
            in_array($type, ['boolean', 'tinyint(1)'])=> 'boolean',
            in_array($type, ['date'])                 => 'date',
            in_array($type, ['datetime'])             => 'dateTime',
            in_array($type, ['timestamp'])            => 'timestamp',
            in_array($type, ['json', 'jsonb'])        => 'json',
            in_array($type, ['uuid'])                 => 'uuid',
            default                                   => 'string',
        };
    }

    private function formatDefault(string $default, string $type): string
    {
        if (in_array($type, ['int', 'bigint', 'smallint', 'tinyint', 'float', 'double', 'decimal'])) {
            return $default;
        }
        return "'{$default}'";
    }
}
