<?php

namespace App\Http\Controllers;

use App\Models\WebCounterSection;
use App\Http\Requests\CreateWebCounterSectionRequest;
use App\Http\Requests\UpdateWebCounterSectionRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebCounterSectionController extends Controller
{
    public function index(Request $request)
    {
        $webCounterSections = WebCounterSection::paginate(15);
        return view('web_counter_sections.index', compact('webCounterSections'));
    }

    public function create()
    {
        // FIX: передаём пустую модель — _fields использует $webCounterSection->field ?? ''
        $webCounterSection = new WebCounterSection();
        return view('web_counter_sections.create', compact('webCounterSection'));
    }

    public function store(CreateWebCounterSectionRequest $request)
    {
        WebCounterSection::create($request->validated());
        return redirect()->route('web-counter-sections.index')
            ->with('success', 'WebCounterSection created successfully.');
    }

    public function show($id)
    {
        $webCounterSection = WebCounterSection::findOrFail($id);
        return view('web_counter_sections.show', compact('webCounterSection'));
    }

    public function edit($id)
    {
        $webCounterSection = WebCounterSection::findOrFail($id);
        return view('web_counter_sections.edit', compact('webCounterSection'));
    }

    // FIX: исправлен порядок параметров — Request всегда первым
    public function update(UpdateWebCounterSectionRequest $request, $id)
    {
        $webCounterSection = WebCounterSection::findOrFail($id);
        $webCounterSection->update($request->validated());
        return redirect()->route('web-counter-sections.index')
            ->with('success', 'WebCounterSection updated successfully.');
    }

    public function destroy($id)
    {
        WebCounterSection::findOrFail($id)->delete();
        return redirect()->route('web-counter-sections.index')
            ->with('success', 'WebCounterSection deleted successfully.');
    }
}