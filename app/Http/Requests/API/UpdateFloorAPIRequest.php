<?php

namespace App\Http\Requests\API;

use App\Models\Floor;
use InfyOm\Generator\Request\APIRequest;

class UpdateFloorAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return Floor::$rules ?? [];
    }
}