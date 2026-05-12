<?php

namespace App\Http\Controllers\API;

use App\Models\WebFacility;
use App\Http\Requests\API\CreateWebFacilityAPIRequest;
use App\Http\Requests\API\UpdateWebFacilityAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WebFacilityAPIController extends AppBaseController
{
    /**
     * Display a listing of the WebFacility.
     * GET /api/web_facilities
     */
    public function index(Request $request): JsonResponse
    {
        $query = WebFacility::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Web Facilities retrieved successfully');
    }

    /**
     * Store a newly created WebFacility.
     * POST /api/web_facilities
     */
    public function store(CreateWebFacilityAPIRequest $request): JsonResponse
    {
        $webFacility = WebFacility::create($request->all());
        return $this->sendResponse($webFacility->toArray(), 'Web Facility saved successfully');
    }

    /**
     * Display the specified WebFacility.
     * GET /api/web_facilities/{id}
     */
    public function show(int $id): JsonResponse
    {
        $webFacility = WebFacility::find($id);
        if (empty($webFacility)) {
            return $this->sendError('Web Facility not found');
        }
        return $this->sendResponse($webFacility->toArray(), 'Web Facility retrieved successfully');
    }

    /**
     * Update the specified WebFacility.
     * PUT /api/web_facilities/{id}
     */
    public function update(int $id, UpdateWebFacilityAPIRequest $request): JsonResponse
    {
        $webFacility = WebFacility::find($id);
        if (empty($webFacility)) {
            return $this->sendError('Web Facility not found');
        }
        $webFacility->fill($request->all())->save();
        return $this->sendResponse($webFacility->toArray(), 'Web Facility updated successfully');
    }

    /**
     * Remove the specified WebFacility.
     * DELETE /api/web_facilities/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $webFacility = WebFacility::find($id);
        if (empty($webFacility)) {
            return $this->sendError('Web Facility not found');
        }
        $webFacility->delete();
        return $this->sendSuccess('Web Facility deleted successfully');
    }
}