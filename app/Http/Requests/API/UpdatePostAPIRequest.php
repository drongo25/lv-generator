<?php

namespace App\Http\Requests\API;

use App\Models\Post;
use InfyOm\Generator\Request\APIRequest;

class UpdatePostAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return Post::$rules ?? [];
    }
}