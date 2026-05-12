<?php

namespace App\Http\Requests;

use App\Models\WebOurTeam;
use Illuminate\Foundation\Http\FormRequest;

class CreateWebOurTeamRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return WebOurTeam::$rules ?? [];
    }
}