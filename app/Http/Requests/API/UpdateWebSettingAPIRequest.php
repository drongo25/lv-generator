<?php

namespace App\Http\Requests\API;

use App\Models\WebSetting;
use InfyOm\Generator\Request\APIRequest;

class UpdateWebSettingAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return WebSetting::$rules ?? [];
    }
}