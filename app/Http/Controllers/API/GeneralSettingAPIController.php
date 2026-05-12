<?php

namespace App\Http\Controllers\API;

use App\Models\GeneralSetting;
use App\Http\Requests\API\CreateGeneralSettingAPIRequest;
use App\Http\Requests\API\UpdateGeneralSettingAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GeneralSettingAPIController extends AppBaseController
{
    /**
     * Display a listing of the GeneralSetting.
     * GET /api/general_settings
     */
    public function index(Request $request): JsonResponse
    {
        $query = GeneralSetting::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'General Settings retrieved successfully');
    }

    /**
     * Store a newly created GeneralSetting.
     * POST /api/general_settings
     */
    public function store(CreateGeneralSettingAPIRequest $request): JsonResponse
    {
        $generalSetting = GeneralSetting::create($request->all());
        return $this->sendResponse($generalSetting->toArray(), 'General Setting saved successfully');
    }

    /**
     * Display the specified GeneralSetting.
     * GET /api/general_settings/{id}
     */
    public function show(int $id): JsonResponse
    {
        $generalSetting = GeneralSetting::find($id);
        if (empty($generalSetting)) {
            return $this->sendError('General Setting not found');
        }
        return $this->sendResponse($generalSetting->toArray(), 'General Setting retrieved successfully');
    }

    /**
     * Update the specified GeneralSetting.
     * PUT /api/general_settings/{id}
     */
    public function update(int $id, UpdateGeneralSettingAPIRequest $request): JsonResponse
    {
        $generalSetting = GeneralSetting::find($id);
        if (empty($generalSetting)) {
            return $this->sendError('General Setting not found');
        }
        $generalSetting->fill($request->all())->save();
        return $this->sendResponse($generalSetting->toArray(), 'General Setting updated successfully');
    }

    /**
     * Remove the specified GeneralSetting.
     * DELETE /api/general_settings/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $generalSetting = GeneralSetting::find($id);
        if (empty($generalSetting)) {
            return $this->sendError('General Setting not found');
        }
        $generalSetting->delete();
        return $this->sendSuccess('General Setting deleted successfully');
    }
}