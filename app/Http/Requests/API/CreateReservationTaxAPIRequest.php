<?php

namespace App\Http\Requests\API;

use App\Models\ReservationTax;
use InfyOm\Generator\Request\APIRequest;

class CreateReservationTaxAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return ReservationTax::$rules ?? [];
    }
}