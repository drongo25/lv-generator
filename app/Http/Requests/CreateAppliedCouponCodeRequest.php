<?php

namespace App\Http\Requests;

use App\Models\AppliedCouponCode;
use Illuminate\Foundation\Http\FormRequest;

class CreateAppliedCouponCodeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return AppliedCouponCode::$rules ?? [];
    }
}