<?php

namespace App\Http\Requests\API;

use App\Models\RoomType;
use InfyOm\Generator\Request\APIRequest;

class CreateRoomTypeAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return RoomType::$rules ?? [];
    }
}