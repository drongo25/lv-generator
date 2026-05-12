<?php

namespace App\Http\Requests;

use App\Models\WebOurClientFeedback;
use Illuminate\Foundation\Http\FormRequest;

class CreateWebOurClientFeedbackRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return WebOurClientFeedback::$rules ?? [];
    }
}