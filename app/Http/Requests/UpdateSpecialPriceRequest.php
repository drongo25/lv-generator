<?php

namespace App\Http\Requests;

use App\Models\SpecialPrice;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSpecialPriceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return SpecialPrice::$rules ?? [];
    }
}