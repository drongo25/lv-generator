<?php

namespace App\Http\Controllers;

use App\Models\RoomTypeImage;
use App\Http\Requests\CreateRoomTypeImageRequest;
use App\Http\Requests\UpdateRoomTypeImageRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomTypeImageController extends Controller
{
    public function index(Request $request)
    {
        $roomTypeImages = RoomTypeImage::paginate(15);
        return view('room_type_images.index', compact('roomTypeImages'));
    }

    public function create()
    {
        // FIX: передаём пустую модель — _fields использует $roomTypeImage->field ?? ''
        $roomTypeImage = new RoomTypeImage();
        return view('room_type_images.create', compact('roomTypeImage'));
    }

    public function store(CreateRoomTypeImageRequest $request)
    {
        RoomTypeImage::create($request->validated());
        return redirect()->route('room-type-images.index')
            ->with('success', 'RoomTypeImage created successfully.');
    }

    public function show($id)
    {
        $roomTypeImage = RoomTypeImage::findOrFail($id);
        return view('room_type_images.show', compact('roomTypeImage'));
    }

    public function edit($id)
    {
        $roomTypeImage = RoomTypeImage::findOrFail($id);
        return view('room_type_images.edit', compact('roomTypeImage'));
    }

    // FIX: исправлен порядок параметров — Request всегда первым
    public function update(UpdateRoomTypeImageRequest $request, $id)
    {
        $roomTypeImage = RoomTypeImage::findOrFail($id);
        $roomTypeImage->update($request->validated());
        return redirect()->route('room-type-images.index')
            ->with('success', 'RoomTypeImage updated successfully.');
    }

    public function destroy($id)
    {
        RoomTypeImage::findOrFail($id)->delete();
        return redirect()->route('room-type-images.index')
            ->with('success', 'RoomTypeImage deleted successfully.');
    }
}