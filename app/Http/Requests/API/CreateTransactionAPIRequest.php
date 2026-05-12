<?php

namespace App\Http\Requests\API;

use App\Models\Transaction;
use InfyOm\Generator\Request\APIRequest;

class CreateTransactionAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return Transaction::$rules ?? [];
    }
}