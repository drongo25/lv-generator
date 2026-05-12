<?php

namespace App\Http\Requests;

use App\Models\CouponMaster;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCouponMasterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return CouponMaster::$rules ?? [];
    }
}