<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Http\Requests\CreateFloorRequest;
use App\Http\Requests\UpdateFloorRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    public function index(Request $request)
    {
        $floors = Floor::paginate(15);
        return view('floors.index', compact('floors'));
    }

    public function create()
    {
        return view('floors.create');
    }

    public function store(CreateFloorRequest $request)
    {
        Floor::create($request->validated());
        return redirect()->route('floors.index')
            ->with('success', 'Floor created successfully.');
    }

    public function show($id)
    {
        $floor = Floor::findOrFail($id);
        return view('floors.show', compact('floor'));
    }

    public function edit($id)
    {
        $floor = Floor::findOrFail($id);
        return view('floors.edit', compact('floor'));
    }

    public function update($id, UpdateFloorRequest $request)
    {
        $floor = Floor::findOrFail($id);
        $floor->update($request->validated());
        return redirect()->route('floors.index')
            ->with('success', 'Floor updated successfully.');
    }

    public function destroy($id)
    {
        Floor::findOrFail($id)->delete();
        return redirect()->route('floors.index')
            ->with('success', 'Floor deleted successfully.');
    }
}