<?php

namespace App\Http\Requests;

use App\Models\WebFaq;
use Illuminate\Foundation\Http\FormRequest;

class UpdateWebFaqRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return WebFaq::$rules ?? [];
    }
}