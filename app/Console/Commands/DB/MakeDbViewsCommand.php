<?php
// ============================================================
// app/Console/Commands/DB/MakeDbViewsCommand.php
// Исправления:
//   1. _fields — переменные теперь $model->field ?? '' (не $field ?? '')
//   2. _fields — remember_token исключён из формы
//   3. _fields — password: без value, без required, с подсказкой
//   4. _fields — file-поля используют type="file"
//   5. index/show — password и remember_token скрыты
//   6. create/edit — добавляется enctype при наличии file-полей
// ============================================================
namespace App\Console\Commands\DB;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MakeDbViewsCommand extends BaseDbCommand
{
    protected $name = 'make:db-views';
    protected $description = 'Generate CRUD Blade views + layout from existing database tables';

    private bool $layoutEnsured = false;

    /** Поля, скрытые из таблиц index/show и исключённые из формы */
    private const HIDDEN_FIELDS = ['password', 'remember_token'];

    /** Поля, исключённые только из формы (но не из index/show) */
    private const FORM_ONLY_EXCLUDE = ['remember_token'];

    /** Имена столбцов, которые становятся type="file" */
    private const FILE_FIELD_NAMES = [
        'picture', 'image', 'photo', 'avatar',
        'thumbnail', 'file', 'attachment', 'banner', 'logo', 'icon',
    ];

    // ================================================================
    // Точка входа
    // ================================================================

    protected function generate(string $table, string $connection): void
    {
        if (!$this->layoutEnsured) {
            $this->ensureLayout();
            $this->layoutEnsured = true;
        }

        $modelName = $this->modelName($table);
        $camel = Str::camel($modelName);
        $camelPlural = Str::camel(Str::plural($modelName));
        $snake = Str::snake(Str::plural($modelName));
        $human = Str::title(str_replace('_', ' ', Str::snake($modelName)));
        $humanPlural = Str::title(str_replace('_', ' ', Str::snake(Str::plural($modelName))));
        $routeBase = Str::kebab(Str::plural($modelName));

        $columns = DB::connection($connection)->getSchemaBuilder()->getColumns($table);
        $columns = array_values(array_filter(
            $columns,
            fn($c) => !in_array($c['name'], ['id', 'created_at', 'updated_at', 'deleted_at'])
        ));

        // Колонки для index/show — без чувствительных полей
        $displayColumns = array_values(array_filter(
            $columns,
            fn($c) => !in_array($c['name'], self::HIDDEN_FIELDS)
        ));

        // Есть ли file-поля — нужен enctype
        $hasFile = !empty(array_filter(
            $columns,
            fn($c) => in_array(strtolower($c['name']), self::FILE_FIELD_NAMES)
        ));

        $dir = resource_path("views/{$snake}");
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $force = (bool)$this->option('force');

        $this->writeFile("{$dir}/index.blade.php", $this->indexView($camel, $camelPlural, $humanPlural, $routeBase, $snake, $displayColumns), $force);
        $this->writeFile("{$dir}/create.blade.php", $this->createView($human, $routeBase, $snake, $hasFile), $force);
        $this->writeFile("{$dir}/edit.blade.php", $this->editView($human, $camel, $routeBase, $snake, $hasFile), $force);
        $this->writeFile("{$dir}/show.blade.php", $this->showView($camel, $human, $routeBase, $displayColumns), $force);
        $this->writeFile("{$dir}/_fields.blade.php", $this->fieldsPartial($columns, $camel), $force);

        $this->appendNavLink($humanPlural, $routeBase, $snake);
    }

    // ================================================================
    // Layout helpers (без изменений)
    // ================================================================

    private function ensureLayout(): void
    {
        $dir = resource_path('views/layouts');
        if (!is_dir($dir)) mkdir($dir, 0755, true);
        $this->ensureAppBlade();
        $this->ensureNavigationBlade();
    }

    private function ensureAppBlade(): void
    {
        $path = resource_path('views/layouts/app.blade.php');
        if (file_exists($path)) {
            $this->line('  <fg=gray>layouts/app.blade.php уже существует, пропуск.</>');
            return;
        }
        $stub = <<<'BLADE'
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar { min-height: 100vh; background-color: #f8f9fa; border-right: 1px solid #dee2e6; }
        @media (min-width: 768px) { .sidebar { position: sticky; top: 0; } }
    </style>
    @stack('styles')
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 sidebar p-0">
            <div class="p-3">
                <a href="/" class="link-dark text-decoration-none">
                    <span class="fs-5 fw-bold">{{ config('app.name', 'Laravel') }}</span>
                </a>
                <hr>
                @include('layouts.navigation')
            </div>
        </nav>
        <main class="col-md-9 col-lg-10 ms-sm-auto px-md-4 py-4">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
BLADE;
        file_put_contents($path, $stub);
        $this->line('  <fg=green>✔ Создан:</> resources/views/layouts/app.blade.php');
    }

    private function ensureNavigationBlade(): void
    {
        $path = resource_path('views/layouts/navigation.blade.php');
        if (file_exists($path)) {
            $this->line('  <fg=gray>layouts/navigation.blade.php уже существует, пропуск.</>');
            return;
        }
        // (содержимое навигации не изменилось — вставьте оригинал)
        $this->line('  <fg=green>✔ Создан:</> resources/views/layouts/navigation.blade.php');
    }

    private function appendNavLink(string $humanPlural, string $routeBase, string $snake): void
    {
        $navPath = resource_path('views/layouts/navigation.blade.php');
        if (!file_exists($navPath)) {
            $this->warn("  navigation.blade.php не найден, пункт меню не добавлен.");
            return;
        }
        $contents = file_get_contents($navPath);
        if (str_contains($contents, "routeIs('{$routeBase}.*')")) {
            $this->line("  <fg=yellow>⚠ Пункт меню «{$humanPlural}» уже есть в navigation.blade.php</>");
            return;
        }
        $collapseId = 'collapseGen' . Str::studly($routeBase);
        $headingId = 'headingGen' . Str::studly($routeBase);
        $item = <<<BLADE

    {{-- Группа: {$humanPlural} --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="{$headingId}">
            <button class="accordion-button {{ request()->is('{$snake}*') ? '' : 'collapsed' }}"
                    type="button" data-bs-toggle="collapse" data-bs-target="#{$collapseId}">
                {$humanPlural}
            </button>
        </h2>
        <div id="{$collapseId}"
             class="accordion-collapse collapse {{ request()->is('{$snake}*') ? 'show' : '' }}"
             data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('{$routeBase}.*') ? 'active' : '' }}"
                       href="{{ route('{$routeBase}.index') }}">{$humanPlural}</a>
                </nav>
            </div>
        </div>
    </div>
BLADE;
        $start = '{{-- GENERATED MENU START --}}';
        $end = '{{-- GENERATED MENU END --}}';
        if (str_contains($contents, $start) && str_contains($contents, $end)) {
            $contents = str_replace($start, $start . $item, $contents);
            file_put_contents($navPath, $contents);
            $this->line("  <fg=green>✔ Аккордеон-группа «{$humanPlural}» добавлена в navigation.blade.php</>");
            return;
        }
        $anchor = '</div>' . PHP_EOL . PHP_EOL . '<style>';
        if (str_contains($contents, $anchor)) {
            $contents = str_replace(
                $anchor,
                $start . $item . PHP_EOL . '    ' . $end . PHP_EOL . PHP_EOL . '</div>' . PHP_EOL . PHP_EOL . '<style>',
                $contents
            );
            file_put_contents($navPath, $contents);
            $this->line("  <fg=green>✔ Аккордеон-группа «{$humanPlural}» добавлена (авто-поиск места)</>");
            return;
        }
        file_put_contents($navPath, $contents . "\n{{-- TODO: добавить вручную accordion-item для route '{$routeBase}.index' ({$humanPlural}) --}}\n");
        $this->warn("  ⚠ Не удалось найти место вставки. Добавлен TODO-комментарий в navigation.blade.php");
    }

    // ================================================================
    // View builders
    // ================================================================

    private function indexView(string $camel, string $camelPlural, string $humanPlural, string $routeBase, string $snake, array $columns): string
    {
        // FIX: password и remember_token уже отфильтрованы в $displayColumns
        $headers = implode("\n", array_map(
            fn($c) => "                <th>" . Str::title(str_replace('_', ' ', $c['name'])) . "</th>",
            $columns
        ));
        $cells = implode("\n", array_map(
            fn($c) => "                <td>{{ \${$camel}->{$c['name']} }}</td>",
            $columns
        ));

        return <<<BLADE
@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">{$humanPlural}</h1>
    <a href="{{ route('{$routeBase}.create') }}" class="btn btn-primary">+ Add New</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
{$headers}
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse(\${$camelPlural} as \${$camel})
                    <tr>
{$cells}
                        <td>
                            <a href="{{ route('{$routeBase}.show', \${$camel}->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('{$routeBase}.edit', \${$camel}->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('{$routeBase}.destroy', \${$camel}->id) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="99" class="text-center text-muted py-4">No records found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-3">{{ \${$camelPlural}->links() }}</div>
@endsection
BLADE;
    }

    private function createView(string $human, string $routeBase, string $snake, bool $hasFile): string
    {
        // FIX: добавляем enctype если есть file-поля
        $enctype = $hasFile ? ' enctype="multipart/form-data"' : '';

        return <<<BLADE
@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header"><h4 class="mb-0">Create {$human}</h4></div>
            <div class="card-body">
                <form action="{{ route('{$routeBase}.store') }}" method="POST"{$enctype}>
                    @csrf
                    @include('{$snake}._fields')
                    <div class="d-flex gap-2 mt-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('{$routeBase}.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
BLADE;
    }

    private function editView(string $human, string $camel, string $routeBase, string $snake, bool $hasFile): string
    {
        // FIX: добавляем enctype если есть file-поля
        $enctype = $hasFile ? ' enctype="multipart/form-data"' : '';

        return <<<BLADE
@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header"><h4 class="mb-0">Edit {$human}</h4></div>
            <div class="card-body">
                <form action="{{ route('{$routeBase}.update', \${$camel}->id) }}" method="POST"{$enctype}>
                    @csrf @method('PUT')
                    @include('{$snake}._fields')
                    <div class="d-flex gap-2 mt-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('{$routeBase}.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
BLADE;
    }

    private function showView(string $camel, string $human, string $routeBase, array $columns): string
    {
        // FIX: password и remember_token уже отфильтрованы в $displayColumns
        $rows = implode("\n", array_map(fn($c) => <<<BLADE
        <tr>
            <th class="w-25">{{ __('{$c['name']}') }}</th>
            <td>{{ \${$camel}->{$c['name']} }}</td>
        </tr>
BLADE, $columns));

        return <<<BLADE
@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">{$human} Details</h4>
                <a href="{{ route('{$routeBase}.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
{$rows}
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('{$routeBase}.edit', \${$camel}->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('{$routeBase}.destroy', \${$camel}->id) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
BLADE;
    }

    private function fieldsPartial(array $columns, string $camel): string
    {
        $fields = [];

        foreach ($columns as $col) {
            $name = $col['name'];
            $label = Str::title(str_replace('_', ' ', $name));

            // FIX: remember_token полностью исключаем из формы
            if (in_array($name, self::FORM_ONLY_EXCLUDE)) {
                continue;
            }

            $type = $this->htmlType($col['type_name'], $name);
            $nullable = $col['nullable'] ?? true;

            // FIX: password — без required (валидация на сервере),
            //      с подсказкой, без value (безопасность)
            if ($name === 'password') {
                $fields[] = <<<BLADE
<div class="mb-3">
    <label for="{$name}" class="form-label fw-semibold">
        {$label}
        <small class="text-muted fw-normal">(leave blank to keep current)</small>
    </label>
    <input type="password" name="{$name}" id="{$name}"
           class="form-control @error('{$name}') is-invalid @enderror">
    @error('{$name}')
        <div class="invalid-feedback">{{ \$message }}</div>
    @enderror
</div>
BLADE;
                continue;
            }

            $required = $nullable ? '' : ' required';

            if ($type === 'textarea') {
                // FIX: используем $camel->field ?? '' вместо $field ?? ''
                $input = <<<BLADE
    <textarea name="{$name}" id="{$name}" rows="4"
              class="form-control @error('{$name}') is-invalid @enderror"{$required}>{{ old('{$name}', \${$camel}->{$name} ?? '') }}</textarea>
BLADE;
            } elseif ($type === 'checkbox') {
                $input = <<<BLADE
    <div class="form-check">
        <input type="checkbox" name="{$name}" id="{$name}" value="1"
               class="form-check-input @error('{$name}') is-invalid @enderror"
               {{ old('{$name}', \${$camel}->{$name} ?? false) ? 'checked' : '' }}{$required}>
        <label class="form-check-label" for="{$name}">{$label}</label>
    </div>
BLADE;
            } elseif ($type === 'file') {
                // FIX: file-поля не имеют value
                $input = <<<BLADE
    <input type="file" name="{$name}" id="{$name}"
           class="form-control @error('{$name}') is-invalid @enderror"{$required}>
BLADE;
            } else {
                // FIX: используем $camel->field ?? '' вместо $field ?? ''
                $input = <<<BLADE
    <input type="{$type}" name="{$name}" id="{$name}"
           value="{{ old('{$name}', \${$camel}->{$name} ?? '') }}"
           class="form-control @error('{$name}') is-invalid @enderror"{$required}>
BLADE;
            }

            $fields[] = <<<BLADE
<div class="mb-3">
    <label for="{$name}" class="form-label fw-semibold">{$label}</label>
{$input}
    @error('{$name}')
        <div class="invalid-feedback">{{ \$message }}</div>
    @enderror
</div>
BLADE;
        }

        return implode("\n\n", $fields);
    }

    private function htmlType(string $dbType, string $name): string
    {
        $nameLower = strtolower($name);

        // FIX: file-поля по имени колонки
        if (in_array($nameLower, self::FILE_FIELD_NAMES)) return 'file';

        if (str_contains($nameLower, 'password')) return 'password';
        if (str_contains($nameLower, 'email')) return 'email';
        if (str_contains($nameLower, 'url')) return 'url';
        if (str_contains($nameLower, 'phone')) return 'tel';
        if (str_contains($nameLower, 'color')) return 'color';

        return match (true) {
            in_array($dbType, ['text', 'mediumtext', 'longtext']) => 'textarea',
            in_array($dbType, ['date']) => 'date',
            in_array($dbType, ['datetime', 'timestamp']) => 'datetime-local',
            in_array($dbType, ['time']) => 'time',
            in_array($dbType, ['boolean', 'tinyint(1)']) => 'checkbox',
            in_array($dbType, ['int', 'integer', 'bigint', 'smallint', 'float', 'double', 'decimal']) => 'number',
            default => 'text',
        };
    }
}
