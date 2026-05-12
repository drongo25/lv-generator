<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use App\Http\Requests\CreateGeneralSettingRequest;
use App\Http\Requests\UpdateGeneralSettingRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    public function index(Request $request)
    {
        $generalSettings = GeneralSetting::paginate(15);
        return view('general_settings.index', compact('generalSettings'));
    }

    public function create()
    {
        // FIX: передаём пустую модель — _fields использует $generalSetting->field ?? ''
        $generalSetting = new GeneralSetting();
        return view('general_settings.create', compact('generalSetting'));
    }

    public function store(CreateGeneralSettingRequest $request)
    {
        GeneralSetting::create($request->validated());
        return redirect()->route('general-settings.index')
            ->with('success', 'GeneralSetting created successfully.');
    }

    public function show($id)
    {
        $generalSetting = GeneralSetting::findOrFail($id);
        return view('general_settings.show', compact('generalSetting'));
    }

    public function edit($id)
    {
        $generalSetting = GeneralSetting::findOrFail($id);
        return view('general_settings.edit', compact('generalSetting'));
    }

    // FIX: исправлен порядок параметров — Request всегда первым
    public function update(UpdateGeneralSettingRequest $request, $id)
    {
        $generalSetting = GeneralSetting::findOrFail($id);
        $generalSetting->update($request->validated());
        return redirect()->route('general-settings.index')
            ->with('success', 'GeneralSetting updated successfully.');
    }

    public function destroy($id)
    {
        GeneralSetting::findOrFail($id)->delete();
        return redirect()->route('general-settings.index')
            ->with('success', 'GeneralSetting deleted successfully.');
    }
}