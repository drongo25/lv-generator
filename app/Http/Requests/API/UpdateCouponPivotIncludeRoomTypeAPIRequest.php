<?php

namespace App\Http\Requests\API;

use App\Models\CouponPivotIncludeRoomType;
use InfyOm\Generator\Request\APIRequest;

class UpdateCouponPivotIncludeRoomTypeAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return CouponPivotIncludeRoomType::$rules ?? [];
    }
}