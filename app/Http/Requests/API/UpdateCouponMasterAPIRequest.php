<?php

namespace App\Http\Requests\API;

use App\Models\CouponMaster;
use InfyOm\Generator\Request\APIRequest;

class UpdateCouponMasterAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return CouponMaster::$rules ?? [];
    }
}