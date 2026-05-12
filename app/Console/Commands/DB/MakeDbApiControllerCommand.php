<?php

// ============================================================
// src/Commands/DB/MakeDbApiControllerCommand.php
// ============================================================
namespace App\Console\Commands\DB;
//namespace InfyOm\Generator\Commands\DB;

use Illuminate\Support\Str;

class MakeDbApiControllerCommand extends BaseDbCommand
{
    protected $name = 'make:db-api-controller';
    protected $description = 'Generate API controllers from existing database tables';

    protected function generate(string $table, string $connection): void
    {
        $modelName = $this->modelName($table);
        $controllerName = $modelName . 'APIController';
        $ctrlNs = config('laravel_generator.namespace.api_controller', 'App\Http\Controllers\API');
        $modelNs = config('laravel_generator.namespace.model', 'App\Models');
        $reqNs = config('laravel_generator.namespace.api_request', 'App\Http\Requests\API');
        $camel = Str::camel($modelName);
        $camelPlural = Str::camel(Str::plural($modelName));
        $humanPlural = Str::title(str_replace('_', ' ', Str::plural(Str::snake($modelName))));
        $human = Str::title(str_replace('_', ' ', Str::snake($modelName)));

        $stub = <<<PHP
<?php

namespace {$ctrlNs};

use {$modelNs}\\{$modelName};
use {$reqNs}\\Create{$modelName}APIRequest;
use {$reqNs}\\Update{$modelName}APIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class {$controllerName} extends AppBaseController
{
    /**
     * Display a listing of the {$modelName}.
     * GET /api/{$table}
     */
    public function index(Request \$request): JsonResponse
    {
        \$query = {$modelName}::query();

        if (\$skip = \$request->get('skip'))  \$query->skip((int) \$skip);
        if (\$limit = \$request->get('limit')) \$query->limit((int) \$limit);

        return \$this->sendResponse(\$query->get()->toArray(), '{$humanPlural} retrieved successfully');
    }

    /**
     * Store a newly created {$modelName}.
     * POST /api/{$table}
     */
    public function store(Create{$modelName}APIRequest \$request): JsonResponse
    {
        \${$camel} = {$modelName}::create(\$request->all());
        return \$this->sendResponse(\${$camel}->toArray(), '{$human} saved successfully');
    }

    /**
     * Display the specified {$modelName}.
     * GET /api/{$table}/{id}
     */
    public function show(int \$id): JsonResponse
    {
        \${$camel} = {$modelName}::find(\$id);
        if (empty(\${$camel})) {
            return \$this->sendError('{$human} not found');
        }
        return \$this->sendResponse(\${$camel}->toArray(), '{$human} retrieved successfully');
    }

    /**
     * Update the specified {$modelName}.
     * PUT /api/{$table}/{id}
     */
    public function update(int \$id, Update{$modelName}APIRequest \$request): JsonResponse
    {
        \${$camel} = {$modelName}::find(\$id);
        if (empty(\${$camel})) {
            return \$this->sendError('{$human} not found');
        }
        \${$camel}->fill(\$request->all())->save();
        return \$this->sendResponse(\${$camel}->toArray(), '{$human} updated successfully');
    }

    /**
     * Remove the specified {$modelName}.
     * DELETE /api/{$table}/{id}
     */
    public function destroy(int \$id): JsonResponse
    {
        \${$camel} = {$modelName}::find(\$id);
        if (empty(\${$camel})) {
            return \$this->sendError('{$human} not found');
        }
        \${$camel}->delete();
        return \$this->sendSuccess('{$human} deleted successfully');
    }
}
PHP;

        $path = app_path("Http/Controllers/API/{$controllerName}.php");
        $this->writeFile($path, $stub, (bool)$this->option('force'));

        $this->generateApiRequests($modelName, $reqNs, $modelNs);
    }

    private function generateApiRequests(string $modelName, string $reqNs, string $modelNs): void
    {
        foreach (['Create', 'Update'] as $prefix) {
            $stub = <<<PHP
<?php

namespace {$reqNs};

use {$modelNs}\\{$modelName};
use InfyOm\Generator\Request\APIRequest;

class {$prefix}{$modelName}APIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return {$modelName}::\$rules ?? [];
    }
}
PHP;
            $dir = app_path('Http/Requests/API');
            $path = "{$dir}/{$prefix}{$modelName}APIRequest.php";
            $this->writeFile($path, $stub, (bool)$this->option('force'));
        }
    }
}
