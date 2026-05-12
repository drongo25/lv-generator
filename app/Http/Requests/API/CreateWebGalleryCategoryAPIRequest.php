<?php

namespace App\Http\Requests\API;

use App\Models\WebGalleryCategory;
use InfyOm\Generator\Request\APIRequest;

class CreateWebGalleryCategoryAPIRequest extends APIRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return WebGalleryCategory::$rules ?? [];
    }
}