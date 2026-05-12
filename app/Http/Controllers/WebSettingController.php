<?php

namespace App\Http\Controllers;

use App\Models\WebSetting;
use App\Http\Requests\CreateWebSettingRequest;
use App\Http\Requests\UpdateWebSettingRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebSettingController extends Controller
{
    public function index(Request $request)
    {
        $webSettings = WebSetting::paginate(15);
        return view('web_settings.index', compact('webSettings'));
    }

    public function create()
    {
        // FIX: передаём пустую модель — _fields использует $webSetting->field ?? ''
        $webSetting = new WebSetting();
        return view('web_settings.create', compact('webSetting'));
    }

    public function store(CreateWebSettingRequest $request)
    {
        WebSetting::create($request->validated());
        return redirect()->route('web-settings.index')
            ->with('success', 'WebSetting created successfully.');
    }

    public function show($id)
    {
        $webSetting = WebSetting::findOrFail($id);
        return view('web_settings.show', compact('webSetting'));
    }

    public function edit($id)
    {
        $webSetting = WebSetting::findOrFail($id);
        return view('web_settings.edit', compact('webSetting'));
    }

    // FIX: исправлен порядок параметров — Request всегда первым
    public function update(UpdateWebSettingRequest $request, $id)
    {
        $webSetting = WebSetting::findOrFail($id);
        $webSetting->update($request->validated());
        return redirect()->route('web-settings.index')
            ->with('success', 'WebSetting updated successfully.');
    }

    public function destroy($id)
    {
        WebSetting::findOrFail($id)->delete();
        return redirect()->route('web-settings.index')
            ->with('success', 'WebSetting deleted successfully.');
    }
}