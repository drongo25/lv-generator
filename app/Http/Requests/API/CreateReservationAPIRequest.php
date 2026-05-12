<?php

namespace App\Http\Requests\API;

use App\Models\Reservation;
use InfyOm\Generator\Request\APIRequest;

class CreateReservationAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return Reservation::$rules ?? [];
    }
}