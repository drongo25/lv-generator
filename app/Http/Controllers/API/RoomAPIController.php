<?php

namespace App\Http\Controllers\API;

use App\Models\Room;
use App\Http\Requests\API\CreateRoomAPIRequest;
use App\Http\Requests\API\UpdateRoomAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoomAPIController extends AppBaseController
{
    /**
     * Display a listing of the Room.
     * GET /api/rooms
     */
    public function index(Request $request): JsonResponse
    {
        $query = Room::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Rooms retrieved successfully');
    }

    /**
     * Store a newly created Room.
     * POST /api/rooms
     */
    public function store(CreateRoomAPIRequest $request): JsonResponse
    {
        $room = Room::create($request->all());
        return $this->sendResponse($room->toArray(), 'Room saved successfully');
    }

    /**
     * Display the specified Room.
     * GET /api/rooms/{id}
     */
    public function show(int $id): JsonResponse
    {
        $room = Room::find($id);
        if (empty($room)) {
            return $this->sendError('Room not found');
        }
        return $this->sendResponse($room->toArray(), 'Room retrieved successfully');
    }

    /**
     * Update the specified Room.
     * PUT /api/rooms/{id}
     */
    public function update(int $id, UpdateRoomAPIRequest $request): JsonResponse
    {
        $room = Room::find($id);
        if (empty($room)) {
            return $this->sendError('Room not found');
        }
        $room->fill($request->all())->save();
        return $this->sendResponse($room->toArray(), 'Room updated successfully');
    }

    /**
     * Remove the specified Room.
     * DELETE /api/rooms/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $room = Room::find($id);
        if (empty($room)) {
            return $this->sendError('Room not found');
        }
        $room->delete();
        return $this->sendSuccess('Room deleted successfully');
    }
}