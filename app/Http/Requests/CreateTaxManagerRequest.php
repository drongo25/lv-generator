<?php

namespace App\Http\Requests;

use App\Models\TaxManager;
use Illuminate\Foundation\Http\FormRequest;

class CreateTaxManagerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return TaxManager::$rules ?? [];
    }
}