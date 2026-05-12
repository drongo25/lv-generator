<?php

namespace App\Http\Requests\API;

use App\Models\TaxManager;
use InfyOm\Generator\Request\APIRequest;

class CreateTaxManagerAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return TaxManager::$rules ?? [];
    }
}