<?php

namespace App\Http\Controllers;

use App\Models\WebFacility;
use App\Http\Requests\CreateWebFacilityRequest;
use App\Http\Requests\UpdateWebFacilityRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebFacilityController extends Controller
{
    public function index(Request $request)
    {
        $webFacilities = WebFacility::paginate(15);
        return view('web_facilities.index', compact('webFacilities'));
    }

    public function create()
    {
        // FIX: передаём пустую модель — _fields использует $webFacility->field ?? ''
        $webFacility = new WebFacility();
        return view('web_facilities.create', compact('webFacility'));
    }

    public function store(CreateWebFacilityRequest $request)
    {
        WebFacility::create($request->validated());
        return redirect()->route('web-facilities.index')
            ->with('success', 'WebFacility created successfully.');
    }

    public function show($id)
    {
        $webFacility = WebFacility::findOrFail($id);
        return view('web_facilities.show', compact('webFacility'));
    }

    public function edit($id)
    {
        $webFacility = WebFacility::findOrFail($id);
        return view('web_facilities.edit', compact('webFacility'));
    }

    // FIX: исправлен порядок параметров — Request всегда первым
    public function update(UpdateWebFacilityRequest $request, $id)
    {
        $webFacility = WebFacility::findOrFail($id);
        $webFacility->update($request->validated());
        return redirect()->route('web-facilities.index')
            ->with('success', 'WebFacility updated successfully.');
    }

    public function destroy($id)
    {
        WebFacility::findOrFail($id)->delete();
        return redirect()->route('web-facilities.index')
            ->with('success', 'WebFacility deleted successfully.');
    }
}