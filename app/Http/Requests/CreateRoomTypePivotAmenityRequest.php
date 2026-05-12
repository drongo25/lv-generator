<?php

namespace App\Http\Requests;

use App\Models\RoomTypePivotAmenity;
use Illuminate\Foundation\Http\FormRequest;

class CreateRoomTypePivotAmenityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return RoomTypePivotAmenity::$rules ?? [];
    }
}