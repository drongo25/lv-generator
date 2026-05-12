<?php

namespace App\Http\Controllers\API;

use App\Models\WebGalleryCategory;
use App\Http\Requests\API\CreateWebGalleryCategoryAPIRequest;
use App\Http\Requests\API\UpdateWebGalleryCategoryAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WebGalleryCategoryAPIController extends AppBaseController
{
    /**
     * Display a listing of the WebGalleryCategory.
     * GET /api/web_gallery_categories
     */
    public function index(Request $request): JsonResponse
    {
        $query = WebGalleryCategory::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Web Gallery Categories retrieved successfully');
    }

    /**
     * Store a newly created WebGalleryCategory.
     * POST /api/web_gallery_categories
     */
    public function store(CreateWebGalleryCategoryAPIRequest $request): JsonResponse
    {
        $webGalleryCategory = WebGalleryCategory::create($request->all());
        return $this->sendResponse($webGalleryCategory->toArray(), 'Web Gallery Category saved successfully');
    }

    /**
     * Display the specified WebGalleryCategory.
     * GET /api/web_gallery_categories/{id}
     */
    public function show(int $id): JsonResponse
    {
        $webGalleryCategory = WebGalleryCategory::find($id);
        if (empty($webGalleryCategory)) {
            return $this->sendError('Web Gallery Category not found');
        }
        return $this->sendResponse($webGalleryCategory->toArray(), 'Web Gallery Category retrieved successfully');
    }

    /**
     * Update the specified WebGalleryCategory.
     * PUT /api/web_gallery_categories/{id}
     */
    public function update(int $id, UpdateWebGalleryCategoryAPIRequest $request): JsonResponse
    {
        $webGalleryCategory = WebGalleryCategory::find($id);
        if (empty($webGalleryCategory)) {
            return $this->sendError('Web Gallery Category not found');
        }
        $webGalleryCategory->fill($request->all())->save();
        return $this->sendResponse($webGalleryCategory->toArray(), 'Web Gallery Category updated successfully');
    }

    /**
     * Remove the specified WebGalleryCategory.
     * DELETE /api/web_gallery_categories/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $webGalleryCategory = WebGalleryCategory::find($id);
        if (empty($webGalleryCategory)) {
            return $this->sendError('Web Gallery Category not found');
        }
        $webGalleryCategory->delete();
        return $this->sendSuccess('Web Gallery Category deleted successfully');
    }
}