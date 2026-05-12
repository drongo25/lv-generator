<?php

namespace App\Http\Requests;

use App\Models\RegularPrice;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRegularPriceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return RegularPrice::$rules ?? [];
    }
}