<?php

namespace App\Http\Requests\API;

use App\Models\WebOurTeam;
use InfyOm\Generator\Request\APIRequest;

class CreateWebOurTeamAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return WebOurTeam::$rules ?? [];
    }
}