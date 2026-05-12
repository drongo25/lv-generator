<?php

namespace App\Http\Requests\API;

use App\Models\WebOurClientFeedback;
use InfyOm\Generator\Request\APIRequest;

class CreateWebOurClientFeedbackAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return WebOurClientFeedback::$rules ?? [];
    }
}