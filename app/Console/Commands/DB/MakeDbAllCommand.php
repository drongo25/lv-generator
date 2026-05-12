<?php

// ============================================================
// src/Commands/DB/MakeDbAllCommand.php  (удобная «обёртка»)
// ============================================================

namespace App\Console\Commands\DB;
//namespace InfyOm\Generator\Commands\DB;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;

class MakeDbAllCommand extends Command
{
    protected $name = 'make:db-all';
    protected $description = 'Run all make:db-* generators at once';

    public function handle(): int
    {
        $args = [
            '--connection' => $this->option('connection'),
            '--force' => $this->option('force'),
        ];

        if ($this->option('table')) $args['--table'] = $this->option('table');
        if ($this->option('skip')) $args['--skip'] = $this->option('skip');

        $commands = [
            'make:db-migration',
            'make:db-model',
            'make:db-factory',
            'make:db-seeder',
            'make:db-controller',
            'make:db-api-controller',
            'make:db-views',
        ];

        foreach ($commands as $cmd) {
            $this->info("\n=== Running {$cmd} ===");
            $this->call($cmd, $args);
        }

        return 0;
    }

    public function getOptions(): array
    {
        return [
            ['table', null, InputOption::VALUE_OPTIONAL, 'Generate only for this table'],
            ['skip', null, InputOption::VALUE_OPTIONAL, 'Comma-separated tables to skip'],
            ['connection', null, InputOption::VALUE_OPTIONAL, 'Database connection name'],
            ['force', 'f', InputOption::VALUE_NONE, 'Overwrite existing files'],
        ];
    }
}
