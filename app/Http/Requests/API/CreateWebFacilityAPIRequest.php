<?php

namespace App\Http\Requests\API;

use App\Models\WebFacility;
use InfyOm\Generator\Request\APIRequest;

class CreateWebFacilityAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return WebFacility::$rules ?? [];
    }
}