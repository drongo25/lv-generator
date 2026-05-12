<?php

// ============================================================
// src/Commands/DB/MakeDbFactoryCommand.php
// ============================================================

namespace App\Console\Commands\DB;
//namespace InfyOm\Generator\Commands\DB;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MakeDbFactoryCommand extends BaseDbCommand
{
    protected $name = 'make:db-factory';
    protected $description = 'Generate factory classes from existing database tables';

    protected function generate(string $table, string $connection): void
    {
        $modelName = $this->modelName($table);
        $factoryName = $modelName . 'Factory';
        $namespace = config('laravel_generator.namespace.factory', 'Database\Factories');
        $modelNs = config('laravel_generator.namespace.model', 'App\Models');
        $columns = DB::connection($connection)->getSchemaBuilder()->getColumns($table);

        $fields = $this->buildFakerFields($columns);

        $stub = <<<PHP
<?php

namespace {$namespace};

use {$modelNs}\\{$modelName};
use Illuminate\Database\Eloquent\Factories\Factory;

class {$factoryName} extends Factory
{
    protected \$model = {$modelName}::class;

    public function definition(): array
    {
        return [
{$fields}
        ];
    }
}
PHP;

        $path = database_path("factories/{$factoryName}.php");
        $this->writeFile($path, $stub, (bool)$this->option('force'));
    }

    private function buildFakerFields(array $columns): string
    {
        $skip = ['id', 'created_at', 'updated_at', 'deleted_at'];
        $lines = [];

        foreach ($columns as $col) {
            $name = $col['name'];
            if (in_array($name, $skip)) continue;

            $faker = $this->fakerFor($name, $col['type_name']);
            $lines[] = "            '{$name}' => {$faker},";
        }

        return implode("\n", $lines);
    }

    private function fakerFor(string $name, string $type): string
    {
        $lower = strtolower($name);

        // Семантика по имени поля
        if (str_contains($lower, 'email')) return 'fake()->unique()->safeEmail()';
        if (str_contains($lower, 'phone')) return 'fake()->phoneNumber()';
        if (str_contains($lower, 'password')) return 'bcrypt(fake()->password())';
        if (str_contains($lower, 'name')) return 'fake()->name()';
        if (str_contains($lower, 'title')) return 'fake()->sentence()';
        if (str_contains($lower, 'body') || str_contains($lower, 'description') || str_contains($lower, 'content'))
            return 'fake()->paragraph()';
        if (str_contains($lower, 'address')) return 'fake()->address()';
        if (str_contains($lower, 'url') || str_contains($lower, 'link')) return 'fake()->url()';
        if (str_ends_with($lower, '_id')) return 'fake()->randomNumber()';

        // По типу
        return match (true) {
            in_array($type, ['int', 'integer', 'bigint', 'smallint', 'tinyint']) => 'fake()->randomNumber()',
            in_array($type, ['float', 'double', 'decimal', 'numeric']) => 'fake()->randomFloat(2, 0, 9999)',
            in_array($type, ['boolean', 'tinyint(1)']) => 'fake()->boolean()',
            in_array($type, ['date']) => "fake()->date()",
            in_array($type, ['datetime', 'timestamp']) => "fake()->dateTime()",
            in_array($type, ['json', 'jsonb']) => '[]',
            in_array($type, ['text', 'mediumtext', 'longtext']) => 'fake()->paragraph()',
            default => 'fake()->word()',
        };
    }
}
