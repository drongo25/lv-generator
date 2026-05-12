<?php

namespace App\Http\Requests;

use App\Models\CouponPivotPaidService;
use Illuminate\Foundation\Http\FormRequest;

class CreateCouponPivotPaidServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return CouponPivotPaidService::$rules ?? [];
    }
}