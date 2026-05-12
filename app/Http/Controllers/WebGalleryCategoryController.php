<?php

namespace App\Http\Controllers;

use App\Models\WebGalleryCategory;
use App\Http\Requests\CreateWebGalleryCategoryRequest;
use App\Http\Requests\UpdateWebGalleryCategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebGalleryCategoryController extends Controller
{
    public function index(Request $request)
    {
        $webGalleryCategories = WebGalleryCategory::paginate(15);
        return view('web_gallery_categories.index', compact('webGalleryCategories'));
    }

    public function create()
    {
        // FIX: передаём пустую модель — _fields использует $webGalleryCategory->field ?? ''
        $webGalleryCategory = new WebGalleryCategory();
        return view('web_gallery_categories.create', compact('webGalleryCategory'));
    }

    public function store(CreateWebGalleryCategoryRequest $request)
    {
        WebGalleryCategory::create($request->validated());
        return redirect()->route('web-gallery-categories.index')
            ->with('success', 'WebGalleryCategory created successfully.');
    }

    public function show($id)
    {
        $webGalleryCategory = WebGalleryCategory::findOrFail($id);
        return view('web_gallery_categories.show', compact('webGalleryCategory'));
    }

    public function edit($id)
    {
        $webGalleryCategory = WebGalleryCategory::findOrFail($id);
        return view('web_gallery_categories.edit', compact('webGalleryCategory'));
    }

    // FIX: исправлен порядок параметров — Request всегда первым
    public function update(UpdateWebGalleryCategoryRequest $request, $id)
    {
        $webGalleryCategory = WebGalleryCategory::findOrFail($id);
        $webGalleryCategory->update($request->validated());
        return redirect()->route('web-gallery-categories.index')
            ->with('success', 'WebGalleryCategory updated successfully.');
    }

    public function destroy($id)
    {
        WebGalleryCategory::findOrFail($id)->delete();
        return redirect()->route('web-gallery-categories.index')
            ->with('success', 'WebGalleryCategory deleted successfully.');
    }
}