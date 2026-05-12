<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\CreateRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $rooms = Room::paginate(15);
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        // FIX: передаём пустую модель — _fields использует $room->field ?? ''
        $room = new Room();
        return view('rooms.create', compact('room'));
    }

    public function store(CreateRoomRequest $request)
    {
        Room::create($request->validated());
        return redirect()->route('rooms.index')
            ->with('success', 'Room created successfully.');
    }

    public function show($id)
    {
        $room = Room::findOrFail($id);
        return view('rooms.show', compact('room'));
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('rooms.edit', compact('room'));
    }

    // FIX: исправлен порядок параметров — Request всегда первым
    public function update(UpdateRoomRequest $request, $id)
    {
        $room = Room::findOrFail($id);
        $room->update($request->validated());
        return redirect()->route('rooms.index')
            ->with('success', 'Room updated successfully.');
    }

    public function destroy($id)
    {
        Room::findOrFail($id)->delete();
        return redirect()->route('rooms.index')
            ->with('success', 'Room deleted successfully.');
    }
}