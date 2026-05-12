<?php

namespace App\Http\Requests;

use App\Models\GeneralSetting;
use Illuminate\Foundation\Http\FormRequest;

class CreateGeneralSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return GeneralSetting::$rules ?? [];
    }
}