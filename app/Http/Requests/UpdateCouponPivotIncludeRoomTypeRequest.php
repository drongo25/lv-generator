<?php

namespace App\Http\Requests;

use App\Models\CouponPivotIncludeRoomType;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCouponPivotIncludeRoomTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return CouponPivotIncludeRoomType::$rules ?? [];
    }
}