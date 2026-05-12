<?php

namespace App\Http\Controllers\API;

use App\Models\RoomTypeImage;
use App\Http\Requests\API\CreateRoomTypeImageAPIRequest;
use App\Http\Requests\API\UpdateRoomTypeImageAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoomTypeImageAPIController extends AppBaseController
{
    /**
     * Display a listing of the RoomTypeImage.
     * GET /api/room_type_images
     */
    public function index(Request $request): JsonResponse
    {
        $query = RoomTypeImage::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Room Type Images retrieved successfully');
    }

    /**
     * Store a newly created RoomTypeImage.
     * POST /api/room_type_images
     */
    public function store(CreateRoomTypeImageAPIRequest $request): JsonResponse
    {
        $roomTypeImage = RoomTypeImage::create($request->all());
        return $this->sendResponse($roomTypeImage->toArray(), 'Room Type Image saved successfully');
    }

    /**
     * Display the specified RoomTypeImage.
     * GET /api/room_type_images/{id}
     */
    public function show(int $id): JsonResponse
    {
        $roomTypeImage = RoomTypeImage::find($id);
        if (empty($roomTypeImage)) {
            return $this->sendError('Room Type Image not found');
        }
        return $this->sendResponse($roomTypeImage->toArray(), 'Room Type Image retrieved successfully');
    }

    /**
     * Update the specified RoomTypeImage.
     * PUT /api/room_type_images/{id}
     */
    public function update(int $id, UpdateRoomTypeImageAPIRequest $request): JsonResponse
    {
        $roomTypeImage = RoomTypeImage::find($id);
        if (empty($roomTypeImage)) {
            return $this->sendError('Room Type Image not found');
        }
        $roomTypeImage->fill($request->all())->save();
        return $this->sendResponse($roomTypeImage->toArray(), 'Room Type Image updated successfully');
    }

    /**
     * Remove the specified RoomTypeImage.
     * DELETE /api/room_type_images/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $roomTypeImage = RoomTypeImage::find($id);
        if (empty($roomTypeImage)) {
            return $this->sendError('Room Type Image not found');
        }
        $roomTypeImage->delete();
        return $this->sendSuccess('Room Type Image deleted successfully');
    }
}