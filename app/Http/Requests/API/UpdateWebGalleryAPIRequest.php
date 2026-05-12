<?php

namespace App\Http\Requests\API;

use App\Models\WebGallery;
use InfyOm\Generator\Request\APIRequest;

class UpdateWebGalleryAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return WebGallery::$rules ?? [];
    }
}