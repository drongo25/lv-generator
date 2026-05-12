<?php

namespace App\Http\Requests\API;

use App\Models\WebCounterSection;
use InfyOm\Generator\Request\APIRequest;

class UpdateWebCounterSectionAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return WebCounterSection::$rules ?? [];
    }
}