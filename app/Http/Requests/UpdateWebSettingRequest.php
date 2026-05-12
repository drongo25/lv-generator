<?php

namespace App\Http\Requests;

use App\Models\WebSetting;
use Illuminate\Foundation\Http\FormRequest;

class UpdateWebSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return WebSetting::$rules ?? [];
    }
}