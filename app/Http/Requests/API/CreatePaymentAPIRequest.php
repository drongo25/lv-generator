<?php

namespace App\Http\Requests\API;

use App\Models\Payment;
use InfyOm\Generator\Request\APIRequest;

class CreatePaymentAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return Payment::$rules ?? [];
    }
}