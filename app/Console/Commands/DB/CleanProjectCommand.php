<?php

namespace App\Console\Commands\DB;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CleanProjectCommand extends Command
{
    protected $signature = 'make:db-clean-project {--force : Ignore confirmation}';
    protected $description = 'Deep cleaning of CRUD files and resetting menus/routes with analysis of navigation items';

    protected array $whiteList = [
        'app/Http/Controllers/Controller.php',
        'app/Http/Controllers/AppBaseController.php',
        'database/seeders/DatabaseSeeder.php',
        'resources/views/layouts/app.blade.php',
        'resources/views/layouts/navigation.blade.php',
        'resources/views/welcome.blade.php',
    ];

    protected array $targets = [
        'app/Http/Controllers',
        'app/Http/Requests',
        'app/Models',
        'database/factories',
        'database/seeders',
        'database/migrations',
        'resources/views',
    ];

    public function handle(): void
    {
        $this->line("<fg=white;bg=blue;options=bold>  ПРОТОКОЛ ГЛУБОКОЙ ОЧИСТКИ ПРОЕКТА  </>");
        $this->newLine();

        // --- ЭТАП 1: Сканирование файлов ---
        $this->info("1. Анализ файлов для удаления...");
        $filesToDelete = $this->collectFilesToDelete();

        if (empty($filesToDelete)) {
            $this->comment("Лишних файлов не найдено. Проект чист.");
            // Даже если файлов нет, покажем текущее меню
            $this->showCurrentMenu();
            return;
        }

        // --- ЭТАП 2: Предпросмотр файлов ---
        $this->line("<fg=yellow>Будет удалено " . count($filesToDelete) . " файл(ов):</>");
        foreach ($filesToDelete as $file) {
            $this->line("  <fg=red>[-]</> {$file['rel_path']}");
        }
        $this->newLine();

        // --- ЭТАП 3: Анализ меню ПЕРЕД удалением ---
        $this->showCurrentMenu("Текущее состояние меню навигации:");

        // --- ЭТАП 4: Подтверждение ---
        if (!$this->option('force')) {
            if (!$this->confirm('Вы подтверждаете очистку проекта и сброс меню?', true)) {
                $this->warn('Очистка отменена.');
                return;
            }
        }

        $this->newLine();
        $this->info("2. Удаление файлов...");

        // --- ЭТАП 5: Физическое удаление ---
        $deletedCount = 0;
        foreach ($filesToDelete as $file) {
            if (File::delete($file['full_path'])) {
                $this->line("  <fg=red>[-] Удалено:</> {$file['rel_path']}");
                $deletedCount++;
            }
        }

        // --- ЭТАП 6: Очистка пустых папок ---
        $foldersRemoved = 0;
        foreach ($this->targets as $target) {
            $foldersRemoved += $this->removeEmptySubfolders(base_path($target));
        }

        // --- ЭТАП 7: Сброс web.php и навигации ---
        $this->resetWebRoutes();
        $this->resetNavigationBlade();

        // --- ИТОГ ---
        $this->newLine();
        $this->line("<fg=white;bg=green;options=bold>  ОЧИСТКА ЗАВЕРШЕНА  </>");

        $this->table(
            ['Объект', 'Результат'],
            [['Файлы', "Удалено $deletedCount"], ['Папки', "Удалено $foldersRemoved"]]
        );

        // --- ЭТАП 8: Анализ меню ПОСЛЕ удаления ---
        $this->showCurrentMenu("Состояние меню ПОСЛЕ очистки:");
        $this->newLine();
    }

    /**
     * Извлекает и отображает названия пунктов меню из navigation.blade.php
     */
    private function showCurrentMenu(string $title = "Пункты меню:"): void
    {
        $path = resource_path('views/layouts/navigation.blade.php');
        if (!File::exists($path)) return;

        $contents = File::get($path);

        // Регулярка ищет текст внутри кнопок аккордеона
        preg_match_all('/<button[^>]*>(.*?)<\/button>/s', $contents, $matches);

        $items = array_map(fn($m) => trim(strip_tags($m)), $matches[1]);
        $items = array_filter($items, fn($i) => !empty($i));

        $this->line("<fg=cyan>$title</>");
        if (empty($items)) {
            $this->line("  <fg=gray>(меню пусто)</>");
        } else {
            foreach ($items as $item) {
                $this->line("  <fg=blue>➔</> $item");
            }
        }
        $this->newLine();
    }

    private function collectFilesToDelete(): array
    {
        $toDelete = [];
        foreach ($this->targets as $targetDir) {
            $fullPath = base_path($targetDir);
            if (!File::isDirectory($fullPath)) continue;
            foreach (File::allFiles($fullPath) as $file) {
                $relPath = str_replace(base_path() . DIRECTORY_SEPARATOR, '', $file->getRealPath());
                $relPath = str_replace('\\', '/', $relPath);
                if (!in_array($relPath, $this->whiteList)) {
                    $toDelete[] = ['rel_path' => $relPath, 'full_path' => $file->getRealPath()];
                }
            }
        }
        return $toDelete;
    }

    private function removeEmptySubfolders(string $path): int
    {
        $removed = 0;
        if (!File::isDirectory($path)) return 0;
        foreach (File::directories($path) as $dir) {
            $removed += $this->removeEmptySubfolders($dir);
            if (empty(File::allFiles($dir)) && empty(File::directories($dir))) {
                File::deleteDirectory($dir);
                $removed++;
            }
        }
        return $removed;
    }

    private function resetWebRoutes(): void
    {
        $stub = "<?php\n\nuse Illuminate\Support\Facades\Route;\n\nRoute::get('/', function () {\n    return view('welcome');\n});\n\n// {{-- GENERATED ROUTES START --}}\n// {{-- GENERATED ROUTES END --}}";
        File::put(base_path('routes/web.php'), $stub);
        $this->line("  <fg=green>[✔]</> routes/web.php сброшен.");
    }

    private function resetNavigationBlade(): void
    {
        $path = resource_path('views/layouts/navigation.blade.php');
        if (!File::exists($path)) return;

        $contents = File::get($path);
        $start = '{{-- GENERATED MENU START --}}';
        $end = '{{-- GENERATED MENU END --}}';
        $pattern = '/(' . preg_quote($start) . ').*?(' . preg_quote($end) . ')/s';

        if (preg_match($pattern, $contents)) {
            $newContents = preg_replace($pattern, $start . "\n    " . $end, $contents);
            File::put($path, $newContents);
            $this->line("  <fg=green>[✔]</> navigation.blade.php очищен.");
        }
    }
}
