<?php

namespace App\Http\Requests;

use App\Models\WebGalleryCategory;
use Illuminate\Foundation\Http\FormRequest;

class CreateWebGalleryCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return WebGalleryCategory::$rules ?? [];
    }
}