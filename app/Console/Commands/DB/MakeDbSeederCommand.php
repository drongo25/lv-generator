<?php

// ============================================================
// src/Commands/DB/MakeDbSeederCommand.php
// ============================================================
namespace App\Console\Commands\DB;
//namespace InfyOm\Generator\Commands\DB;

use Illuminate\Support\Str;

class MakeDbSeederCommand extends BaseDbCommand
{
    protected $name = 'make:db-seeder';
    protected $description = 'Generate seeder classes from existing database tables';

    protected function generate(string $table, string $connection): void
    {
        $modelName = $this->modelName($table);
        $seederName = $modelName . 'Seeder';
        $namespace = config('laravel_generator.namespace.seeder', 'Database\Seeders');
        $modelNs = config('laravel_generator.namespace.model', 'App\Models');

        $stub = <<<PHP
<?php

namespace {$namespace};

use Illuminate\Database\Seeder;
use {$modelNs}\\{$modelName};

class {$seederName} extends Seeder
{
    public function run(): void
    {
        // {$modelName}::factory(10)->create();
    }
}
PHP;

        $path = database_path("seeders/{$seederName}.php");
        $this->writeFile($path, $stub, (bool)$this->option('force'));
    }
}
