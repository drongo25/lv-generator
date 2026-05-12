<?php

namespace App\Http\Requests\API;

use App\Models\Room;
use InfyOm\Generator\Request\APIRequest;

class CreateRoomAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return Room::$rules ?? [];
    }
}