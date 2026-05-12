<?php


// ============================================================
// app/Console/Commands/DB/MakeDbViewsCommand.php
// Добавлена генерация app.blade.php + запись в navigation.blade.php
// ============================================================
namespace App\Console\Commands\DB;
//namespace InfyOm\Generator\Commands\DB;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MakeDbViewsCommand extends BaseDbCommand
{
    protected $name = 'make:db-views';
    protected $description = 'Generate CRUD Blade views + layout from existing database tables';

    /** Флаг — layout создаётся один раз за весь прогон */
    private bool $layoutEnsured = false;

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
        $columns = array_filter(
            $columns,
            fn($c) => !in_array($c['name'], ['id', 'created_at', 'updated_at', 'deleted_at'])
        );

        $dir = resource_path("views/{$snake}");
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $force = (bool)$this->option('force');

        $this->writeFile("{$dir}/index.blade.php", $this->indexView($camel, $camelPlural, $humanPlural, $routeBase, $snake, $columns), $force);
        $this->writeFile("{$dir}/create.blade.php", $this->createView($human, $routeBase, $snake), $force);
        $this->writeFile("{$dir}/edit.blade.php", $this->editView($human, $camel, $routeBase, $snake), $force);
        $this->writeFile("{$dir}/show.blade.php", $this->showView($camel, $human, $routeBase, $columns), $force);
        $this->writeFile("{$dir}/_fields.blade.php", $this->fieldsPartial($columns), $force);

        // Добавить пункт в sidebar-аккордеон
        $this->appendNavLink($humanPlural, $routeBase, $snake);
    }

    // ================================================================
    // Layout — создаём если нет
    // ================================================================

    private function ensureLayout(): void
    {
        $dir = resource_path('views/layouts');
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $this->ensureAppBlade();
        $this->ensureNavigationBlade();
    }

    // ----------------------------------------------------------------
    // resources/views/layouts/app.blade.php  — ВАШ шаблон
    // ----------------------------------------------------------------
    private function ensureAppBlade(): void
    {
        $path = resource_path('views/layouts/app.blade.php');

        if (file_exists($path)) {
            $this->line('  <fg=gray>layouts/app.blade.php уже существует, пропуск.</>');
            return;
        }

        // Ваш оригинальный шаблон — sidebar + Bootstrap 5
        $stub = <<<'BLADE'
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #f8f9fa;
            border-right: 1px solid #dee2e6;
        }
        @media (min-width: 768px) {
            .sidebar {
                position: sticky;
                top: 0;
            }
        }
    </style>
    @stack('styles')
</head>
<body>

    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar — 2/12 колонок -->
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 sidebar p-0">
                <div class="p-3">
                    <a href="/" class="link-dark text-decoration-none">
                        <span class="fs-5 fw-bold">{{ config('app.name', 'Laravel') }}</span>
                    </a>
                    <hr>

                    @include('layouts.navigation')
                </div>
            </nav>

            <!-- Content — 10/12 колонок -->
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

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>
BLADE;

        file_put_contents($path, $stub);
        $this->line('  <fg=green>✔ Создан:</> resources/views/layouts/app.blade.php');
    }

    // ----------------------------------------------------------------
    // resources/views/layouts/navigation.blade.php
    // Базовые группы из вашего оригинала.
    // Между маркерами START/END — пусто, новые группы добавляет appendNavLink().
    // ----------------------------------------------------------------
    private function ensureNavigationBlade(): void
    {
        $path = resource_path('views/layouts/navigation.blade.php');

        if (file_exists($path)) {
            $this->line('  <fg=gray>layouts/navigation.blade.php уже существует, пропуск.</>');
            return;
        }

        $stub = <<<'BLADE'
<div class="accordion accordion-flush" id="sidebarAccordion">

    {{-- Группа: Контент сайта --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingWeb">
            <button class="accordion-button {{ request()->is('web-*') ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWeb">
                Управление сайтом
            </button>
        </h2>
        <div id="collapseWeb" class="accordion-collapse collapse {{ request()->is('web-*') ? 'show' : '' }}" data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('web-socials.*') ? 'active' : '' }}" href="{{ route('web-socials.index') }}">Web Socials</a>
                    <a class="nav-link {{ request()->routeIs('web-settings.*') ? 'active' : '' }}" href="{{ route('web-settings.index') }}">Web Settings</a>
                    <a class="nav-link {{ request()->routeIs('web-our-teams.*') ? 'active' : '' }}" href="{{ route('web-our-teams.index') }}">Web Our Teams</a>
                    <a class="nav-link {{ request()->routeIs('web-our-client-feedbacks.*') ? 'active' : '' }}" href="{{ route('web-our-client-feedbacks.index') }}">Feedbacks</a>
                    <a class="nav-link {{ request()->routeIs('web-galleries.*') ? 'active' : '' }}" href="{{ route('web-galleries.index') }}">Galleries</a>
                    <a class="nav-link {{ request()->routeIs('web-faqs.*') ? 'active' : '' }}" href="{{ route('web-faqs.index') }}">FAQs</a>
                </nav>
            </div>
        </div>
    </div>

    {{-- Группа: Отель / Номера --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingRooms">
            <button class="accordion-button {{ (request()->is('rooms*') || request()->is('room-types*')) ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRooms">
                Номера и Типы
            </button>
        </h2>
        <div id="collapseRooms" class="accordion-collapse collapse {{ (request()->is('rooms*') || request()->is('room-types*')) ? 'show' : '' }}" data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('rooms.*') ? 'active' : '' }}" href="{{ route('rooms.index') }}">Rooms</a>
                    <a class="nav-link {{ request()->routeIs('room-types.*') ? 'active' : '' }}" href="{{ route('room-types.index') }}">Room Types</a>
                    <a class="nav-link {{ request()->routeIs('room-type-images.*') ? 'active' : '' }}" href="{{ route('room-type-images.index') }}">Room Images</a>
                    <a class="nav-link {{ request()->routeIs('amenities.*') ? 'active' : '' }}" href="{{ route('amenities.index') }}">Amenities</a>
                    <a class="nav-link {{ request()->routeIs('floors.*') ? 'active' : '' }}" href="{{ route('floors.index') }}">Floors</a>
                </nav>
            </div>
        </div>
    </div>

    {{-- Группа: Бронирование --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingReservations">
            <button class="accordion-button {{ request()->is('reservations*') ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapseReservations">
                Бронирования
            </button>
        </h2>
        <div id="collapseReservations" class="accordion-collapse collapse {{ request()->is('reservations*') ? 'show' : '' }}" data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('reservations.*') ? 'active' : '' }}" href="{{ route('reservations.index') }}">All Reservations</a>
                    <a class="nav-link {{ request()->routeIs('payments.*') ? 'active' : '' }}" href="{{ route('payments.index') }}">Payments</a>
                    <a class="nav-link {{ request()->routeIs('transactions.*') ? 'active' : '' }}" href="{{ route('transactions.index') }}">Transactions</a>
                </nav>
            </div>
        </div>
    </div>

    {{-- Группа: Скидки и Налоги --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingFinance">
            <button class="accordion-button {{ (request()->is('coupon*') || request()->is('tax*')) ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFinance">
                Маркетинг и Налоги
            </button>
        </h2>
        <div id="collapseFinance" class="accordion-collapse collapse {{ (request()->is('coupon*') || request()->is('tax*')) ? 'show' : '' }}" data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('coupon-masters.*') ? 'active' : '' }}" href="{{ route('coupon-masters.index') }}">Coupons</a>
                    <a class="nav-link {{ request()->routeIs('tax-managers.*') ? 'active' : '' }}" href="{{ route('tax-managers.index') }}">Tax Management</a>
                    <a class="nav-link {{ request()->routeIs('special-prices.*') ? 'active' : '' }}" href="{{ route('special-prices.index') }}">Special Prices</a>
                </nav>
            </div>
        </div>
    </div>

    {{-- Группа: Пользователи --}}
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingUsers">
            <button class="accordion-button {{ (request()->is('users*') || request()->is('admins*')) ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUsers">
                Пользователи
            </button>
        </h2>
        <div id="collapseUsers" class="accordion-collapse collapse {{ (request()->is('users*') || request()->is('admins*')) ? 'show' : '' }}" data-bs-parent="#sidebarAccordion">
            <div class="accordion-body p-0">
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">Users List</a>
                    <a class="nav-link {{ request()->routeIs('admins.*') ? 'active' : '' }}" href="{{ route('admins.index') }}">Admins</a>
                </nav>
            </div>
        </div>
    </div>

    {{-- GENERATED MENU START --}}
    {{-- GENERATED MENU END --}}

</div>

<style>
    .accordion-body .nav-link {
        padding: 0.5rem 1.25rem;
        color: #495057;
        border-bottom: 1px solid #f8f9fa;
        font-size: 0.9rem;
    }
    .accordion-body .nav-link:hover {
        background-color: #e9ecef;
    }
    .accordion-body .nav-link.active {
        background-color: #0d6efd;
        color: white;
    }
    .accordion-button:not(.collapsed) {
        background-color: #f8f9fa;
        color: #0d6efd;
        box-shadow: none;
    }
    .accordion-button:focus {
        box-shadow: none;
    }
</style>
BLADE;

        file_put_contents($path, $stub);
        $this->line('  <fg=green>✔ Создан:</> resources/views/layouts/navigation.blade.php');
    }

    // ================================================================
    // Добавить аккордеон-группу в navigation.blade.php
    // ================================================================

    /**
     * Вставляет новую accordion-item группу между маркерами
     * {{-- GENERATED MENU START --}} и {{-- GENERATED MENU END --}}.
     *
     * Если navigation.blade.php уже существовал (ваш оригинал без маркеров) —
     * маркер ищется, и если его нет — добавляется перед закрывающим </div>
     * основного accordion-контейнера.
     */
    private function appendNavLink(string $humanPlural, string $routeBase, string $snake): void
    {
        $navPath = resource_path('views/layouts/navigation.blade.php');

        if (!file_exists($navPath)) {
            $this->warn("  navigation.blade.php не найден, пункт меню не добавлен.");
            return;
        }

        $contents = file_get_contents($navPath);

        // Не добавлять дважды — проверяем по route-имени
        if (str_contains($contents, "routeIs('{$routeBase}.*')")) {
            $this->line("  <fg=yellow>⚠ Пункт меню «{$humanPlural}» уже есть в navigation.blade.php</>");
            return;
        }

        // Уникальные ID для аккордеона (на основе routeBase)
        $collapseId = 'collapseGen' . Str::studly($routeBase);
        $headingId = 'headingGen' . Str::studly($routeBase);

        // Строим новую accordion-item группу в стиле вашего navigation.blade.php
        $accordionItem = <<<BLADE

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

        $startMarker = '{{-- GENERATED MENU START --}}';
        $endMarker = '{{-- GENERATED MENU END --}}';

        // Вариант 1: маркеры есть — вставляем между ними
        if (str_contains($contents, $startMarker) && str_contains($contents, $endMarker)) {
            $contents = str_replace(
                $startMarker,
                $startMarker . $accordionItem,
                $contents
            );
            file_put_contents($navPath, $contents);
            $this->line("  <fg=green>✔ Аккордеон-группа «{$humanPlural}» добавлена в navigation.blade.php</>");
            return;
        }

        // Вариант 2: маркеров нет (существующий файл без маркеров) —
        // вставляем перед закрывающим </div> основного аккордеона
        // Ищем последнее вхождение закрывающего тега основного div#sidebarAccordion
        $anchorPattern = '</div>' . PHP_EOL . PHP_EOL . '<style>';
        if (str_contains($contents, $anchorPattern)) {
            $contents = str_replace(
                $anchorPattern,
                $startMarker . $accordionItem . PHP_EOL . '    ' . $endMarker
                . PHP_EOL . PHP_EOL . '</div>' . PHP_EOL . PHP_EOL . '<style>',
                $contents
            );
            file_put_contents($navPath, $contents);
            $this->line("  <fg=green>✔ Аккордеон-группа «{$humanPlural}» добавлена (авто-поиск места)</>");
            return;
        }

        // Вариант 3: ничего не нашли — добавить TODO в конец
        file_put_contents(
            $navPath,
            $contents . "\n{{-- TODO: добавить вручную accordion-item для route '{$routeBase}.index' ({$humanPlural}) --}}\n"
        );
        $this->warn("  ⚠ Не удалось найти место вставки. Добавлен TODO-комментарий в navigation.blade.php");
    }

    // ================================================================
    // View builders
    // ================================================================

    private function indexView(string $camel, string $camelPlural, string $humanPlural, string $routeBase, string $snake, array $columns): string
    {
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

    private function createView(string $human, string $routeBase, string $snake): string
    {
        return <<<BLADE
@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header"><h4 class="mb-0">Create {$human}</h4></div>
            <div class="card-body">
                <form action="{{ route('{$routeBase}.store') }}" method="POST">
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

    private function editView(string $human, string $camel, string $routeBase, string $snake): string
    {
        return <<<BLADE
@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header"><h4 class="mb-0">Edit {$human}</h4></div>
            <div class="card-body">
                <form action="{{ route('{$routeBase}.update', \${$camel}->id) }}" method="POST">
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

    private function fieldsPartial(array $columns): string
    {
        $fields = [];
        foreach ($columns as $col) {
            $name = $col['name'];
            $label = Str::title(str_replace('_', ' ', $name));
            $type = $this->htmlType($col['type_name'], $name);
            $required = ($col['nullable'] ?? true) ? '' : ' required';

            if ($type === 'textarea') {
                $input = <<<BLADE
    <textarea name="{$name}" id="{$name}" rows="4"
              class="form-control @error('{$name}') is-invalid @enderror"{$required}>{{ old('{$name}', \${$name} ?? '') }}</textarea>
BLADE;
            } elseif ($type === 'checkbox') {
                $input = <<<BLADE
    <div class="form-check">
        <input type="checkbox" name="{$name}" id="{$name}" value="1"
               class="form-check-input @error('{$name}') is-invalid @enderror"
               {{ old('{$name}', \${$name} ?? false) ? 'checked' : '' }}{$required}>
        <label class="form-check-label" for="{$name}">{$label}</label>
    </div>
BLADE;
            } else {
                $input = <<<BLADE
    <input type="{$type}" name="{$name}" id="{$name}"
           value="{{ old('{$name}', \${$name} ?? '') }}"
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
        if (str_contains(strtolower($name), 'password')) return 'password';
        if (str_contains(strtolower($name), 'email')) return 'email';
        if (str_contains(strtolower($name), 'url')) return 'url';
        if (str_contains(strtolower($name), 'phone')) return 'tel';
        if (str_contains(strtolower($name), 'color')) return 'color';

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
