<?php

namespace App\Http\Requests;

use App\Models\ReservationNight;
use Illuminate\Foundation\Http\FormRequest;

class UpdateReservationNightRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return ReservationNight::$rules ?? [];
    }
}