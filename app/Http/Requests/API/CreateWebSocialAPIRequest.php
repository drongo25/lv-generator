<?php

namespace App\Http\Requests\API;

use App\Models\WebSocial;
use InfyOm\Generator\Request\APIRequest;

class CreateWebSocialAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return WebSocial::$rules ?? [];
    }
}