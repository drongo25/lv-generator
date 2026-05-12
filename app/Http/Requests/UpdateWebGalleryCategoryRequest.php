<?php

namespace App\Http\Requests;

use App\Models\WebGalleryCategory;
use Illuminate\Foundation\Http\FormRequest;

class UpdateWebGalleryCategoryRequest extends FormRequest
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