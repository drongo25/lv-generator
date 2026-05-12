<?php

namespace App\Http\Controllers\API;

use App\Models\WebSetting;
use App\Http\Requests\API\CreateWebSettingAPIRequest;
use App\Http\Requests\API\UpdateWebSettingAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WebSettingAPIController extends AppBaseController
{
    /**
     * Display a listing of the WebSetting.
     * GET /api/web_settings
     */
    public function index(Request $request): JsonResponse
    {
        $query = WebSetting::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Web Settings retrieved successfully');
    }

    /**
     * Store a newly created WebSetting.
     * POST /api/web_settings
     */
    public function store(CreateWebSettingAPIRequest $request): JsonResponse
    {
        $webSetting = WebSetting::create($request->all());
        return $this->sendResponse($webSetting->toArray(), 'Web Setting saved successfully');
    }

    /**
     * Display the specified WebSetting.
     * GET /api/web_settings/{id}
     */
    public function show(int $id): JsonResponse
    {
        $webSetting = WebSetting::find($id);
        if (empty($webSetting)) {
            return $this->sendError('Web Setting not found');
        }
        return $this->sendResponse($webSetting->toArray(), 'Web Setting retrieved successfully');
    }

    /**
     * Update the specified WebSetting.
     * PUT /api/web_settings/{id}
     */
    public function update(int $id, UpdateWebSettingAPIRequest $request): JsonResponse
    {
        $webSetting = WebSetting::find($id);
        if (empty($webSetting)) {
            return $this->sendError('Web Setting not found');
        }
        $webSetting->fill($request->all())->save();
        return $this->sendResponse($webSetting->toArray(), 'Web Setting updated successfully');
    }

    /**
     * Remove the specified WebSetting.
     * DELETE /api/web_settings/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $webSetting = WebSetting::find($id);
        if (empty($webSetting)) {
            return $this->sendError('Web Setting not found');
        }
        $webSetting->delete();
        return $this->sendSuccess('Web Setting deleted successfully');
    }
}