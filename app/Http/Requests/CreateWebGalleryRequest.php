<?php

namespace App\Http\Requests;

use App\Models\WebGallery;
use Illuminate\Foundation\Http\FormRequest;

class CreateWebGalleryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return WebGallery::$rules ?? [];
    }
}