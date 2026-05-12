<?php

namespace App\Http\Controllers;

use App\Models\RoomTypePivotAmenity;
use App\Http\Requests\CreateRoomTypePivotAmenityRequest;
use App\Http\Requests\UpdateRoomTypePivotAmenityRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomTypePivotAmenityController extends Controller
{
    public function index(Request $request)
    {
        $roomTypePivotAmenities = RoomTypePivotAmenity::paginate(15);
        return view('room_type_pivot_amenities.index', compact('roomTypePivotAmenities'));
    }

    public function create()
    {
        return view('room_type_pivot_amenities.create');
    }

    public function store(CreateRoomTypePivotAmenityRequest $request)
    {
        RoomTypePivotAmenity::create($request->validated());
        return redirect()->route('room-type-pivot-amenities.index')
            ->with('success', 'RoomTypePivotAmenity created successfully.');
    }

    public function show($id)
    {
        $roomTypePivotAmenity = RoomTypePivotAmenity::findOrFail($id);
        return view('room_type_pivot_amenities.show', compact('roomTypePivotAmenity'));
    }

    public function edit($id)
    {
        $roomTypePivotAmenity = RoomTypePivotAmenity::findOrFail($id);
        return view('room_type_pivot_amenities.edit', compact('roomTypePivotAmenity'));
    }

    public function update($id, UpdateRoomTypePivotAmenityRequest $request)
    {
        $roomTypePivotAmenity = RoomTypePivotAmenity::findOrFail($id);
        $roomTypePivotAmenity->update($request->validated());
        return redirect()->route('room-type-pivot-amenities.index')
            ->with('success', 'RoomTypePivotAmenity updated successfully.');
    }

    public function destroy($id)
    {
        RoomTypePivotAmenity::findOrFail($id)->delete();
        return redirect()->route('room-type-pivot-amenities.index')
            ->with('success', 'RoomTypePivotAmenity deleted successfully.');
    }
}