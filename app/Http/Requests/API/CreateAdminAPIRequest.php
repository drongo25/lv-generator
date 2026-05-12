<?php

namespace App\Http\Requests\API;

use App\Models\Admin;
use InfyOm\Generator\Request\APIRequest;

class CreateAdminAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return Admin::$rules ?? [];
    }
}