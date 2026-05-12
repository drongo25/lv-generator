<?php

namespace App\Http\Requests;

use App\Models\Gateway;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGatewayRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return Gateway::$rules ?? [];
    }
}