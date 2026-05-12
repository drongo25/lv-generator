<?php

namespace App\Http\Controllers\API;

use App\Models\WebCounterSection;
use App\Http\Requests\API\CreateWebCounterSectionAPIRequest;
use App\Http\Requests\API\UpdateWebCounterSectionAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WebCounterSectionAPIController extends AppBaseController
{
    /**
     * Display a listing of the WebCounterSection.
     * GET /api/web_counter_sections
     */
    public function index(Request $request): JsonResponse
    {
        $query = WebCounterSection::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Web Counter Sections retrieved successfully');
    }

    /**
     * Store a newly created WebCounterSection.
     * POST /api/web_counter_sections
     */
    public function store(CreateWebCounterSectionAPIRequest $request): JsonResponse
    {
        $webCounterSection = WebCounterSection::create($request->all());
        return $this->sendResponse($webCounterSection->toArray(), 'Web Counter Section saved successfully');
    }

    /**
     * Display the specified WebCounterSection.
     * GET /api/web_counter_sections/{id}
     */
    public function show(int $id): JsonResponse
    {
        $webCounterSection = WebCounterSection::find($id);
        if (empty($webCounterSection)) {
            return $this->sendError('Web Counter Section not found');
        }
        return $this->sendResponse($webCounterSection->toArray(), 'Web Counter Section retrieved successfully');
    }

    /**
     * Update the specified WebCounterSection.
     * PUT /api/web_counter_sections/{id}
     */
    public function update(int $id, UpdateWebCounterSectionAPIRequest $request): JsonResponse
    {
        $webCounterSection = WebCounterSection::find($id);
        if (empty($webCounterSection)) {
            return $this->sendError('Web Counter Section not found');
        }
        $webCounterSection->fill($request->all())->save();
        return $this->sendResponse($webCounterSection->toArray(), 'Web Counter Section updated successfully');
    }

    /**
     * Remove the specified WebCounterSection.
     * DELETE /api/web_counter_sections/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $webCounterSection = WebCounterSection::find($id);
        if (empty($webCounterSection)) {
            return $this->sendError('Web Counter Section not found');
        }
        $webCounterSection->delete();
        return $this->sendSuccess('Web Counter Section deleted successfully');
    }
}