<?php

namespace App\Http\Requests;

use App\Models\WebFacility;
use Illuminate\Foundation\Http\FormRequest;

class UpdateWebFacilityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return WebFacility::$rules ?? [];
    }
}