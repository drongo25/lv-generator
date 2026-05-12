<?php
// ============================================================
// app/Console/Commands/DB/MakeDbControllerCommand.php
// Исправления:
//   1. update() — исправлен порядок параметров ($request, $id)
//   2. create()  — передаёт new Model() чтобы _fields мог использовать $model->field
// ============================================================
namespace App\Console\Commands\DB;

use Illuminate\Support\Str;

class MakeDbControllerCommand extends BaseDbCommand
{
    protected $name = 'make:db-controller';
    protected $description = 'Generate scaffold controllers + routes from existing database tables';

    protected function generate(string $table, string $connection): void
    {
        $modelName = $this->modelName($table);
        $ctrlNs = config('laravel_generator.namespace.controller', 'App\Http\Controllers');
        $modelNs = config('laravel_generator.namespace.model', 'App\Models');
        $reqNs = config('laravel_generator.namespace.request', 'App\Http\Requests');
        $camel = Str::camel($modelName);
        $camelPlural = Str::camel(Str::plural($modelName));
        $snake = Str::snake(Str::plural($modelName));
        $routeBase = Str::kebab(Str::plural($modelName));

        $stub = <<<PHP
<?php

namespace {$ctrlNs};

use {$modelNs}\\{$modelName};
use {$reqNs}\\Create{$modelName}Request;
use {$reqNs}\\Update{$modelName}Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class {$modelName}Controller extends Controller
{
    public function index(Request \$request)
    {
        \${$camelPlural} = {$modelName}::paginate(15);
        return view('{$snake}.index', compact('{$camelPlural}'));
    }

    public function create()
    {
        // FIX: передаём пустую модель — _fields использует \${$camel}->field ?? ''
        \${$camel} = new {$modelName}();
        return view('{$snake}.create', compact('{$camel}'));
    }

    public function store(Create{$modelName}Request \$request)
    {
        {$modelName}::create(\$request->validated());
        return redirect()->route('{$routeBase}.index')
            ->with('success', '{$modelName} created successfully.');
    }

    public function show(\$id)
    {
        \${$camel} = {$modelName}::findOrFail(\$id);
        return view('{$snake}.show', compact('{$camel}'));
    }

    public function edit(\$id)
    {
        \${$camel} = {$modelName}::findOrFail(\$id);
        return view('{$snake}.edit', compact('{$camel}'));
    }

    // FIX: исправлен порядок параметров — Request всегда первым
    public function update(Update{$modelName}Request \$request, \$id)
    {
        \${$camel} = {$modelName}::findOrFail(\$id);
        \${$camel}->update(\$request->validated());
        return redirect()->route('{$routeBase}.index')
            ->with('success', '{$modelName} updated successfully.');
    }

    public function destroy(\$id)
    {
        {$modelName}::findOrFail(\$id)->delete();
        return redirect()->route('{$routeBase}.index')
            ->with('success', '{$modelName} deleted successfully.');
    }
}
PHP;

        $path = app_path("Http/Controllers/{$modelName}Controller.php");
        $this->writeFile($path, $stub, (bool)$this->option('force'));

        $this->generateFormRequests($modelName, $reqNs, $modelNs);
        $this->appendRoute($table, "{$modelName}Controller", $ctrlNs, $routeBase);
    }

    // ── routes/web.php ───────────────────────────────────────────────

    private function appendRoute(string $table, string $controllerName, string $ctrlNs, string $routeBase): void
    {
        $routesFile = base_path('routes/web.php');

        if (!file_exists($routesFile)) {
            $this->warn("  routes/web.php не найден, маршрут не добавлен.");
            return;
        }

        $contents = file_get_contents($routesFile);
        $routeLine = "Route::resource('{$routeBase}', \\{$ctrlNs}\\{$controllerName}::class);";

        if (str_contains($contents, $routeLine)) {
            $this->line("  <fg=yellow>⚠ Маршрут {$routeBase} уже существует в web.php</>");
            return;
        }

        file_put_contents($routesFile, $contents . "\n// {$table}\n{$routeLine}\n");
        $this->line("  <fg=green>✔ Маршрут добавлен в routes/web.php:</> {$routeLine}");
    }

    // ── Form Requests ────────────────────────────────────────────────

    private function generateFormRequests(string $modelName, string $reqNs, string $modelNs): void
    {
        foreach (['Create', 'Update'] as $prefix) {
            $stub = <<<PHP
<?php

namespace {$reqNs};

use {$modelNs}\\{$modelName};
use Illuminate\Foundation\Http\FormRequest;

class {$prefix}{$modelName}Request extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return {$modelName}::\$rules ?? [];
    }
}
PHP;
            $path = app_path("Http/Requests/{$prefix}{$modelName}Request.php");
            $this->writeFile($path, $stub, (bool)$this->option('force'));
        }
    }
}
