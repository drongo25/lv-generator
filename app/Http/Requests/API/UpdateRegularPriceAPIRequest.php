<?php

namespace App\Http\Requests\API;

use App\Models\RegularPrice;
use InfyOm\Generator\Request\APIRequest;

class UpdateRegularPriceAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return RegularPrice::$rules ?? [];
    }
}