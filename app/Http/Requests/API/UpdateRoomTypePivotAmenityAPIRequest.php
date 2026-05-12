<?php

namespace App\Http\Requests\API;

use App\Models\RoomTypePivotAmenity;
use InfyOm\Generator\Request\APIRequest;

class UpdateRoomTypePivotAmenityAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return RoomTypePivotAmenity::$rules ?? [];
    }
}