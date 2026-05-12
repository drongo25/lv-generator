<?php

namespace App\Http\Requests;

use App\Models\RoomTypeImage;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomTypeImageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return RoomTypeImage::$rules ?? [];
    }
}