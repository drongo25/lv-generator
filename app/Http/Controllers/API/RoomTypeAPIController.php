<?php

namespace App\Http\Controllers\API;

use App\Models\RoomType;
use App\Http\Requests\API\CreateRoomTypeAPIRequest;
use App\Http\Requests\API\UpdateRoomTypeAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoomTypeAPIController extends AppBaseController
{
    /**
     * Display a listing of the RoomType.
     * GET /api/room_types
     */
    public function index(Request $request): JsonResponse
    {
        $query = RoomType::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Room Types retrieved successfully');
    }

    /**
     * Store a newly created RoomType.
     * POST /api/room_types
     */
    public function store(CreateRoomTypeAPIRequest $request): JsonResponse
    {
        $roomType = RoomType::create($request->all());
        return $this->sendResponse($roomType->toArray(), 'Room Type saved successfully');
    }

    /**
     * Display the specified RoomType.
     * GET /api/room_types/{id}
     */
    public function show(int $id): JsonResponse
    {
        $roomType = RoomType::find($id);
        if (empty($roomType)) {
            return $this->sendError('Room Type not found');
        }
        return $this->sendResponse($roomType->toArray(), 'Room Type retrieved successfully');
    }

    /**
     * Update the specified RoomType.
     * PUT /api/room_types/{id}
     */
    public function update(int $id, UpdateRoomTypeAPIRequest $request): JsonResponse
    {
        $roomType = RoomType::find($id);
        if (empty($roomType)) {
            return $this->sendError('Room Type not found');
        }
        $roomType->fill($request->all())->save();
        return $this->sendResponse($roomType->toArray(), 'Room Type updated successfully');
    }

    /**
     * Remove the specified RoomType.
     * DELETE /api/room_types/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $roomType = RoomType::find($id);
        if (empty($roomType)) {
            return $this->sendError('Room Type not found');
        }
        $roomType->delete();
        return $this->sendSuccess('Room Type deleted successfully');
    }
}