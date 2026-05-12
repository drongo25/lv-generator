<?php

namespace App\Http\Requests;

use App\Models\PaidService;
use Illuminate\Foundation\Http\FormRequest;

class CreatePaidServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return PaidService::$rules ?? [];
    }
}