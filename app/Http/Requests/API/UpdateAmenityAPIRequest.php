<?php

namespace App\Http\Requests\API;

use App\Models\Amenity;
use InfyOm\Generator\Request\APIRequest;

class UpdateAmenityAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return Amenity::$rules ?? [];
    }
}