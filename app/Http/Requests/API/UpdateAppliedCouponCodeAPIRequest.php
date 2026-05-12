<?php

namespace App\Http\Requests\API;

use App\Models\AppliedCouponCode;
use InfyOm\Generator\Request\APIRequest;

class UpdateAppliedCouponCodeAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return AppliedCouponCode::$rules ?? [];
    }
}