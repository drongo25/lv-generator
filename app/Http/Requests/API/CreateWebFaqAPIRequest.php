<?php

namespace App\Http\Requests\API;

use App\Models\WebFaq;
use InfyOm\Generator\Request\APIRequest;

class CreateWebFaqAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return WebFaq::$rules ?? [];
    }
}