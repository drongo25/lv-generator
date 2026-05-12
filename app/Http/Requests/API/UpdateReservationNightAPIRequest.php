<?php

namespace App\Http\Requests\API;

use App\Models\ReservationNight;
use InfyOm\Generator\Request\APIRequest;

class UpdateReservationNightAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return ReservationNight::$rules ?? [];
    }
}