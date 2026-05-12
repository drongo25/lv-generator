<?php

namespace App\Http\Controllers\API;

use App\Models\WebGallery;
use App\Http\Requests\API\CreateWebGalleryAPIRequest;
use App\Http\Requests\API\UpdateWebGalleryAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WebGalleryAPIController extends AppBaseController
{
    /**
     * Display a listing of the WebGallery.
     * GET /api/web_galleries
     */
    public function index(Request $request): JsonResponse
    {
        $query = WebGallery::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Web Galleries retrieved successfully');
    }

    /**
     * Store a newly created WebGallery.
     * POST /api/web_galleries
     */
    public function store(CreateWebGalleryAPIRequest $request): JsonResponse
    {
        $webGallery = WebGallery::create($request->all());
        return $this->sendResponse($webGallery->toArray(), 'Web Gallery saved successfully');
    }

    /**
     * Display the specified WebGallery.
     * GET /api/web_galleries/{id}
     */
    public function show(int $id): JsonResponse
    {
        $webGallery = WebGallery::find($id);
        if (empty($webGallery)) {
            return $this->sendError('Web Gallery not found');
        }
        return $this->sendResponse($webGallery->toArray(), 'Web Gallery retrieved successfully');
    }

    /**
     * Update the specified WebGallery.
     * PUT /api/web_galleries/{id}
     */
    public function update(int $id, UpdateWebGalleryAPIRequest $request): JsonResponse
    {
        $webGallery = WebGallery::find($id);
        if (empty($webGallery)) {
            return $this->sendError('Web Gallery not found');
        }
        $webGallery->fill($request->all())->save();
        return $this->sendResponse($webGallery->toArray(), 'Web Gallery updated successfully');
    }

    /**
     * Remove the specified WebGallery.
     * DELETE /api/web_galleries/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $webGallery = WebGallery::find($id);
        if (empty($webGallery)) {
            return $this->sendError('Web Gallery not found');
        }
        $webGallery->delete();
        return $this->sendSuccess('Web Gallery deleted successfully');
    }
}