<?php

namespace App\Http\Requests;

use App\Models\WebCounterSection;
use Illuminate\Foundation\Http\FormRequest;

class CreateWebCounterSectionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return WebCounterSection::$rules ?? [];
    }
}