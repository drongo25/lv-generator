<?php

namespace App\Http\Requests;

use App\Models\WebSocial;
use Illuminate\Foundation\Http\FormRequest;

class CreateWebSocialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return WebSocial::$rules ?? [];
    }
}