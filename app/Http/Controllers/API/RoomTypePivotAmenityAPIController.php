<?php

namespace App\Http\Controllers\API;

use App\Models\RoomTypePivotAmenity;
use App\Http\Requests\API\CreateRoomTypePivotAmenityAPIRequest;
use App\Http\Requests\API\UpdateRoomTypePivotAmenityAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoomTypePivotAmenityAPIController extends AppBaseController
{
    /**
     * Display a listing of the RoomTypePivotAmenity.
     * GET /api/room_type_pivot_amenity
     */
    public function index(Request $request): JsonResponse
    {
        $query = RoomTypePivotAmenity::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Room Type Pivot Amenities retrieved successfully');
    }

    /**
     * Store a newly created RoomTypePivotAmenity.
     * POST /api/room_type_pivot_amenity
     */
    public function store(CreateRoomTypePivotAmenityAPIRequest $request): JsonResponse
    {
        $roomTypePivotAmenity = RoomTypePivotAmenity::create($request->all());
        return $this->sendResponse($roomTypePivotAmenity->toArray(), 'Room Type Pivot Amenity saved successfully');
    }

    /**
     * Display the specified RoomTypePivotAmenity.
     * GET /api/room_type_pivot_amenity/{id}
     */
    public function show(int $id): JsonResponse
    {
        $roomTypePivotAmenity = RoomTypePivotAmenity::find($id);
        if (empty($roomTypePivotAmenity)) {
            return $this->sendError('Room Type Pivot Amenity not found');
        }
        return $this->sendResponse($roomTypePivotAmenity->toArray(), 'Room Type Pivot Amenity retrieved successfully');
    }

    /**
     * Update the specified RoomTypePivotAmenity.
     * PUT /api/room_type_pivot_amenity/{id}
     */
    public function update(int $id, UpdateRoomTypePivotAmenityAPIRequest $request): JsonResponse
    {
        $roomTypePivotAmenity = RoomTypePivotAmenity::find($id);
        if (empty($roomTypePivotAmenity)) {
            return $this->sendError('Room Type Pivot Amenity not found');
        }
        $roomTypePivotAmenity->fill($request->all())->save();
        return $this->sendResponse($roomTypePivotAmenity->toArray(), 'Room Type Pivot Amenity updated successfully');
    }

    /**
     * Remove the specified RoomTypePivotAmenity.
     * DELETE /api/room_type_pivot_amenity/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $roomTypePivotAmenity = RoomTypePivotAmenity::find($id);
        if (empty($roomTypePivotAmenity)) {
            return $this->sendError('Room Type Pivot Amenity not found');
        }
        $roomTypePivotAmenity->delete();
        return $this->sendSuccess('Room Type Pivot Amenity deleted successfully');
    }
}