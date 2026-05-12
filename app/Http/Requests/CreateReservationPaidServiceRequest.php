<?php

namespace App\Http\Requests;

use App\Models\ReservationPaidService;
use Illuminate\Foundation\Http\FormRequest;

class CreateReservationPaidServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return ReservationPaidService::$rules ?? [];
    }
}