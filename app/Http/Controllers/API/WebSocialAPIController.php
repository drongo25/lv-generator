<?php

namespace App\Http\Controllers\API;

use App\Models\WebSocial;
use App\Http\Requests\API\CreateWebSocialAPIRequest;
use App\Http\Requests\API\UpdateWebSocialAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WebSocialAPIController extends AppBaseController
{
    /**
     * Display a listing of the WebSocial.
     * GET /api/web_socials
     */
    public function index(Request $request): JsonResponse
    {
        $query = WebSocial::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Web Socials retrieved successfully');
    }

    /**
     * Store a newly created WebSocial.
     * POST /api/web_socials
     */
    public function store(CreateWebSocialAPIRequest $request): JsonResponse
    {
        $webSocial = WebSocial::create($request->all());
        return $this->sendResponse($webSocial->toArray(), 'Web Social saved successfully');
    }

    /**
     * Display the specified WebSocial.
     * GET /api/web_socials/{id}
     */
    public function show(int $id): JsonResponse
    {
        $webSocial = WebSocial::find($id);
        if (empty($webSocial)) {
            return $this->sendError('Web Social not found');
        }
        return $this->sendResponse($webSocial->toArray(), 'Web Social retrieved successfully');
    }

    /**
     * Update the specified WebSocial.
     * PUT /api/web_socials/{id}
     */
    public function update(int $id, UpdateWebSocialAPIRequest $request): JsonResponse
    {
        $webSocial = WebSocial::find($id);
        if (empty($webSocial)) {
            return $this->sendError('Web Social not found');
        }
        $webSocial->fill($request->all())->save();
        return $this->sendResponse($webSocial->toArray(), 'Web Social updated successfully');
    }

    /**
     * Remove the specified WebSocial.
     * DELETE /api/web_socials/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $webSocial = WebSocial::find($id);
        if (empty($webSocial)) {
            return $this->sendError('Web Social not found');
        }
        $webSocial->delete();
        return $this->sendSuccess('Web Social deleted successfully');
    }
}