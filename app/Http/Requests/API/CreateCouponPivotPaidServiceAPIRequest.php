<?php

namespace App\Http\Requests\API;

use App\Models\CouponPivotPaidService;
use InfyOm\Generator\Request\APIRequest;

class CreateCouponPivotPaidServiceAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return CouponPivotPaidService::$rules ?? [];
    }
}