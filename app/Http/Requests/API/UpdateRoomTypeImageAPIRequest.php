<?php

namespace App\Http\Requests\API;

use App\Models\RoomTypeImage;
use InfyOm\Generator\Request\APIRequest;

class UpdateRoomTypeImageAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return RoomTypeImage::$rules ?? [];
    }
}