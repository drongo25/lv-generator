<?php

namespace App\Http\Controllers\API;

use App\Models\Amenity;
use App\Http\Requests\API\CreateAmenityAPIRequest;
use App\Http\Requests\API\UpdateAmenityAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AmenityAPIController extends AppBaseController
{
    /**
     * Display a listing of the Amenity.
     * GET /api/amenities
     */
    public function index(Request $request): JsonResponse
    {
        $query = Amenity::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Amenities retrieved successfully');
    }

    /**
     * Store a newly created Amenity.
     * POST /api/amenities
     */
    public function store(CreateAmenityAPIRequest $request): JsonResponse
    {
        $amenity = Amenity::create($request->all());
        return $this->sendResponse($amenity->toArray(), 'Amenity saved successfully');
    }

    /**
     * Display the specified Amenity.
     * GET /api/amenities/{id}
     */
    public function show(int $id): JsonResponse
    {
        $amenity = Amenity::find($id);
        if (empty($amenity)) {
            return $this->sendError('Amenity not found');
        }
        return $this->sendResponse($amenity->toArray(), 'Amenity retrieved successfully');
    }

    /**
     * Update the specified Amenity.
     * PUT /api/amenities/{id}
     */
    public function update(int $id, UpdateAmenityAPIRequest $request): JsonResponse
    {
        $amenity = Amenity::find($id);
        if (empty($amenity)) {
            return $this->sendError('Amenity not found');
        }
        $amenity->fill($request->all())->save();
        return $this->sendResponse($amenity->toArray(), 'Amenity updated successfully');
    }

    /**
     * Remove the specified Amenity.
     * DELETE /api/amenities/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $amenity = Amenity::find($id);
        if (empty($amenity)) {
            return $this->sendError('Amenity not found');
        }
        $amenity->delete();
        return $this->sendSuccess('Amenity deleted successfully');
    }
}