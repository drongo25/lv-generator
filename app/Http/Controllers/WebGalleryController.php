<?php

namespace App\Http\Controllers;

use App\Models\WebGallery;
use App\Http\Requests\CreateWebGalleryRequest;
use App\Http\Requests\UpdateWebGalleryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebGalleryController extends Controller
{
    public function index(Request $request)
    {
        $webGalleries = WebGallery::paginate(15);
        return view('web_galleries.index', compact('webGalleries'));
    }

    public function create()
    {
        // FIX: передаём пустую модель — _fields использует $webGallery->field ?? ''
        $webGallery = new WebGallery();
        return view('web_galleries.create', compact('webGallery'));
    }

    public function store(CreateWebGalleryRequest $request)
    {
        WebGallery::create($request->validated());
        return redirect()->route('web-galleries.index')
            ->with('success', 'WebGallery created successfully.');
    }

    public function show($id)
    {
        $webGallery = WebGallery::findOrFail($id);
        return view('web_galleries.show', compact('webGallery'));
    }

    public function edit($id)
    {
        $webGallery = WebGallery::findOrFail($id);
        return view('web_galleries.edit', compact('webGallery'));
    }

    // FIX: исправлен порядок параметров — Request всегда первым
    public function update(UpdateWebGalleryRequest $request, $id)
    {
        $webGallery = WebGallery::findOrFail($id);
        $webGallery->update($request->validated());
        return redirect()->route('web-galleries.index')
            ->with('success', 'WebGallery updated successfully.');
    }

    public function destroy($id)
    {
        WebGallery::findOrFail($id)->delete();
        return redirect()->route('web-galleries.index')
            ->with('success', 'WebGallery deleted successfully.');
    }
}