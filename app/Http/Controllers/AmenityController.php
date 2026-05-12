<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Http\Requests\CreateAmenityRequest;
use App\Http\Requests\UpdateAmenityRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    public function index(Request $request)
    {
        $amenities = Amenity::paginate(15);
        return view('amenities.index', compact('amenities'));
    }

    public function create()
    {
        return view('amenities.create');
    }

    public function store(CreateAmenityRequest $request)
    {
        Amenity::create($request->validated());
        return redirect()->route('amenities.index')
            ->with('success', 'Amenity created successfully.');
    }

    public function show($id)
    {
        $amenity = Amenity::findOrFail($id);
        return view('amenities.show', compact('amenity'));
    }

    public function edit($id)
    {
        $amenity = Amenity::findOrFail($id);
        return view('amenities.edit', compact('amenity'));
    }

    public function update($id, UpdateAmenityRequest $request)
    {
        $amenity = Amenity::findOrFail($id);
        $amenity->update($request->validated());
        return redirect()->route('amenities.index')
            ->with('success', 'Amenity updated successfully.');
    }

    public function destroy($id)
    {
        Amenity::findOrFail($id)->delete();
        return redirect()->route('amenities.index')
            ->with('success', 'Amenity deleted successfully.');
    }
}