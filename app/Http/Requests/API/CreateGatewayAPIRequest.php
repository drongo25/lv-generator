<?php

namespace App\Http\Requests\API;

use App\Models\Gateway;
use InfyOm\Generator\Request\APIRequest;

class CreateGatewayAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return Gateway::$rules ?? [];
    }
}