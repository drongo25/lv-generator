<?php

namespace App\Http\Requests;

use App\Models\ReservationTax;
use Illuminate\Foundation\Http\FormRequest;

class UpdateReservationTaxRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return ReservationTax::$rules ?? [];
    }
}