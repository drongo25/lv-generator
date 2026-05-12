<?php

namespace App\Http\Requests\API;

use App\Models\ReservationPaidService;
use InfyOm\Generator\Request\APIRequest;

class CreateReservationPaidServiceAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return ReservationPaidService::$rules ?? [];
    }
}