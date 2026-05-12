<?php

namespace App\Http\Requests\API;

use App\Models\PaidService;
use InfyOm\Generator\Request\APIRequest;

class CreatePaidServiceAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return PaidService::$rules ?? [];
    }
}