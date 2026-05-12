<?php

namespace App\Http\Controllers;

use App\Models\WebSocial;
use App\Http\Requests\CreateWebSocialRequest;
use App\Http\Requests\UpdateWebSocialRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebSocialController extends Controller
{
    public function index(Request $request)
    {
        $webSocials = WebSocial::paginate(15);
        return view('web_socials.index', compact('webSocials'));
    }

    public function create()
    {
        // FIX: передаём пустую модель — _fields использует $webSocial->field ?? ''
        $webSocial = new WebSocial();
        return view('web_socials.create', compact('webSocial'));
    }

    public function store(CreateWebSocialRequest $request)
    {
        WebSocial::create($request->validated());
        return redirect()->route('web-socials.index')
            ->with('success', 'WebSocial created successfully.');
    }

    public function show($id)
    {
        $webSocial = WebSocial::findOrFail($id);
        return view('web_socials.show', compact('webSocial'));
    }

    public function edit($id)
    {
        $webSocial = WebSocial::findOrFail($id);
        return view('web_socials.edit', compact('webSocial'));
    }

    // FIX: исправлен порядок параметров — Request всегда первым
    public function update(UpdateWebSocialRequest $request, $id)
    {
        $webSocial = WebSocial::findOrFail($id);
        $webSocial->update($request->validated());
        return redirect()->route('web-socials.index')
            ->with('success', 'WebSocial updated successfully.');
    }

    public function destroy($id)
    {
        WebSocial::findOrFail($id)->delete();
        return redirect()->route('web-socials.index')
            ->with('success', 'WebSocial deleted successfully.');
    }
}