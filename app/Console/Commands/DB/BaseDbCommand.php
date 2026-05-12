<?php

// ============================================================
// src/Commands/DB/BaseDbCommand.php
// ============================================================

namespace App\Console\Commands\DB;
//namespace InfyOm\Generator\Commands\DB;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

abstract class BaseDbCommand extends Command
{
    /**
     * Таблицы, которые всегда исключаются из генерации.
     */
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

    /**
     * Список баз данных, из которых разрешена генерация.
     * Пустой массив = используется только текущее соединение.
     */
    protected array $allowedDatabases = [
        // 'mysql',
        // 'pgsql',
    ];

    // ----------------------------------------------------------------
    // Дополнительные исключения, задаваемые через --skip=table1,table2
    // ----------------------------------------------------------------

    public function handle(): int
    {
        $connection = $this->option('connection') ?: config('database.default');

        if (!empty($this->allowedDatabases) && !in_array($connection, $this->allowedDatabases)) {
            $this->error("Connection «{$connection}» is not in the allowed databases list.");
            return 1;
        }

        $tables = $this->resolveTables($connection);

        if (empty($tables)) {
            $this->warn('No tables found to process.');
            return 0;
        }

        foreach ($tables as $table) {
            $this->info("Processing table: {$table}");
            $this->generate($table, $connection);
        }

        $this->info('Done!');
        return 0;
    }

    /**
     * Генерация для одной таблицы — реализуется в каждой команде.
     */
    abstract protected function generate(string $table, string $connection): void;

    /**
     * Возвращает список таблиц с учётом --table / --skip и excludeTables.
     */
    protected function resolveTables(string $connection): array
    {
        $specificTable = $this->option('table');
        $skipTables = $this->option('skip')
            ? array_map('trim', explode(',', $this->option('skip')))
            : [];

        if ($specificTable) {
            $table = trim($specificTable);
            if ($this->isExcluded($table, $skipTables)) {
                $this->warn("Table «{$table}» is in the exclude list, skipping.");
                return [];
            }
            if (!$this->tableExists($table, $connection)) {
                $this->error("Table «{$table}» does not exist in connection «{$connection}».");
                return [];
            }
            return [$table];
        }

        return array_values(array_filter(
            $this->getAllTables($connection),
            fn($t) => !$this->isExcluded($t, $skipTables)
        ));
    }

    protected function isExcluded(string $table, array $extra = []): bool
    {
        return in_array($table, $this->excludeTables) || in_array($table, $extra);
    }

    protected function getAllTables(string $connection): array
    {
        return array_map(
            fn($t) => array_values((array)$t)[0],
            DB::connection($connection)->select('SHOW TABLES')
        );
    }

    protected function tableExists(string $table, string $connection): bool
    {
        return Schema::connection($connection)->hasTable($table);
    }

    /** Возвращает имя модели из имени таблицы: users -> User */
    protected function modelName(string $table): string
    {
        return Str::studly(Str::singular($table));
    }

    /** Создаёт файл, при необходимости запрашивает перезапись. */
    protected function writeFile(string $path, string $content, bool $force = false): bool
    {
        if (file_exists($path) && !$force) {
            if (!$this->confirm(basename($path) . ' already exists. Overwrite?', true)) {
                $this->warn('Skipped: ' . basename($path));
                return false;
            }
        }

        $dir = dirname($path);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        file_put_contents($path, $content);
        $this->line('  <fg=green>Created:</> ' . $path);
        return true;
    }

    public function getOptions(): array
    {
        return [
            ['table', null, InputOption::VALUE_OPTIONAL, 'Generate only for this table'],
            ['skip', null, InputOption::VALUE_OPTIONAL, 'Comma-separated tables to skip'],
            ['connection', null, InputOption::VALUE_OPTIONAL, 'Database connection name'],
            ['force', 'f', InputOption::VALUE_NONE, 'Overwrite existing files without asking'],
        ];
    }
}
