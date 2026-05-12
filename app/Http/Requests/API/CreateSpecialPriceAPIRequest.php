<?php

namespace App\Http\Requests\API;

use App\Models\SpecialPrice;
use InfyOm\Generator\Request\APIRequest;

class CreateSpecialPriceAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return SpecialPrice::$rules ?? [];
    }
}