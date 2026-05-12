<?php

namespace App\Http\Requests;

use App\Models\Floor;
use Illuminate\Foundation\Http\FormRequest;

class CreateFloorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return Floor::$rules ?? [];
    }
}