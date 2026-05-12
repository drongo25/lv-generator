<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use App\Http\Requests\CreateRoomTypeRequest;
use App\Http\Requests\UpdateRoomTypeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function index(Request $request)
    {
        $roomTypes = RoomType::paginate(15);
        return view('room_types.index', compact('roomTypes'));
    }

    public function create()
    {
        return view('room_types.create');
    }

    public function store(CreateRoomTypeRequest $request)
    {
        RoomType::create($request->validated());
        return redirect()->route('room-types.index')
            ->with('success', 'RoomType created successfully.');
    }

    public function show($id)
    {
        $roomType = RoomType::findOrFail($id);
        return view('room_types.show', compact('roomType'));
    }

    public function edit($id)
    {
        $roomType = RoomType::findOrFail($id);
        return view('room_types.edit', compact('roomType'));
    }

    public function update($id, UpdateRoomTypeRequest $request)
    {
        $roomType = RoomType::findOrFail($id);
        $roomType->update($request->validated());
        return redirect()->route('room-types.index')
            ->with('success', 'RoomType updated successfully.');
    }

    public function destroy($id)
    {
        RoomType::findOrFail($id)->delete();
        return redirect()->route('room-types.index')
            ->with('success', 'RoomType deleted successfully.');
    }
}