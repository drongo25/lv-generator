<?php

namespace App\Http\Controllers\API;

use App\Models\Floor;
use App\Http\Requests\API\CreateFloorAPIRequest;
use App\Http\Requests\API\UpdateFloorAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FloorAPIController extends AppBaseController
{
    /**
     * Display a listing of the Floor.
     * GET /api/floors
     */
    public function index(Request $request): JsonResponse
    {
        $query = Floor::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Floors retrieved successfully');
    }

    /**
     * Store a newly created Floor.
     * POST /api/floors
     */
    public function store(CreateFloorAPIRequest $request): JsonResponse
    {
        $floor = Floor::create($request->all());
        return $this->sendResponse($floor->toArray(), 'Floor saved successfully');
    }

    /**
     * Display the specified Floor.
     * GET /api/floors/{id}
     */
    public function show(int $id): JsonResponse
    {
        $floor = Floor::find($id);
        if (empty($floor)) {
            return $this->sendError('Floor not found');
        }
        return $this->sendResponse($floor->toArray(), 'Floor retrieved successfully');
    }

    /**
     * Update the specified Floor.
     * PUT /api/floors/{id}
     */
    public function update(int $id, UpdateFloorAPIRequest $request): JsonResponse
    {
        $floor = Floor::find($id);
        if (empty($floor)) {
            return $this->sendError('Floor not found');
        }
        $floor->fill($request->all())->save();
        return $this->sendResponse($floor->toArray(), 'Floor updated successfully');
    }

    /**
     * Remove the specified Floor.
     * DELETE /api/floors/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $floor = Floor::find($id);
        if (empty($floor)) {
            return $this->sendError('Floor not found');
        }
        $floor->delete();
        return $this->sendSuccess('Floor deleted successfully');
    }
}