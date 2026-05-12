<?php

namespace App\Http\Requests\API;

use App\Models\GeneralSetting;
use InfyOm\Generator\Request\APIRequest;

class CreateGeneralSettingAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return GeneralSetting::$rules ?? [];
    }
}