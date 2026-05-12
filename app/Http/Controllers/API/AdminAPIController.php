<?php

namespace App\Http\Controllers\API;

use App\Models\Admin;
use App\Http\Requests\API\CreateAdminAPIRequest;
use App\Http\Requests\API\UpdateAdminAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminAPIController extends AppBaseController
{
    /**
     * Display a listing of the Admin.
     * GET /api/admins
     */
    public function index(Request $request): JsonResponse
    {
        $query = Admin::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Admins retrieved successfully');
    }

    /**
     * Store a newly created Admin.
     * POST /api/admins
     */
    public function store(CreateAdminAPIRequest $request): JsonResponse
    {
        $admin = Admin::create($request->all());
        return $this->sendResponse($admin->toArray(), 'Admin saved successfully');
    }

    /**
     * Display the specified Admin.
     * GET /api/admins/{id}
     */
    public function show(int $id): JsonResponse
    {
        $admin = Admin::find($id);
        if (empty($admin)) {
            return $this->sendError('Admin not found');
        }
        return $this->sendResponse($admin->toArray(), 'Admin retrieved successfully');
    }

    /**
     * Update the specified Admin.
     * PUT /api/admins/{id}
     */
    public function update(int $id, UpdateAdminAPIRequest $request): JsonResponse
    {
        $admin = Admin::find($id);
        if (empty($admin)) {
            return $this->sendError('Admin not found');
        }
        $admin->fill($request->all())->save();
        return $this->sendResponse($admin->toArray(), 'Admin updated successfully');
    }

    /**
     * Remove the specified Admin.
     * DELETE /api/admins/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $admin = Admin::find($id);
        if (empty($admin)) {
            return $this->sendError('Admin not found');
        }
        $admin->delete();
        return $this->sendSuccess('Admin deleted successfully');
    }
}