<?php

namespace App\Http\Controllers\API;

use App\Models\PaidService;
use App\Http\Requests\API\CreatePaidServiceAPIRequest;
use App\Http\Requests\API\UpdatePaidServiceAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PaidServiceAPIController extends AppBaseController
{
    /**
     * Display a listing of the PaidService.
     * GET /api/paid_services
     */
    public function index(Request $request): JsonResponse
    {
        $query = PaidService::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Paid Services retrieved successfully');
    }

    /**
     * Store a newly created PaidService.
     * POST /api/paid_services
     */
    public function store(CreatePaidServiceAPIRequest $request): JsonResponse
    {
        $paidService = PaidService::create($request->all());
        return $this->sendResponse($paidService->toArray(), 'Paid Service saved successfully');
    }

    /**
     * Display the specified PaidService.
     * GET /api/paid_services/{id}
     */
    public function show(int $id): JsonResponse
    {
        $paidService = PaidService::find($id);
        if (empty($paidService)) {
            return $this->sendError('Paid Service not found');
        }
        return $this->sendResponse($paidService->toArray(), 'Paid Service retrieved successfully');
    }

    /**
     * Update the specified PaidService.
     * PUT /api/paid_services/{id}
     */
    public function update(int $id, UpdatePaidServiceAPIRequest $request): JsonResponse
    {
        $paidService = PaidService::find($id);
        if (empty($paidService)) {
            return $this->sendError('Paid Service not found');
        }
        $paidService->fill($request->all())->save();
        return $this->sendResponse($paidService->toArray(), 'Paid Service updated successfully');
    }

    /**
     * Remove the specified PaidService.
     * DELETE /api/paid_services/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $paidService = PaidService::find($id);
        if (empty($paidService)) {
            return $this->sendError('Paid Service not found');
        }
        $paidService->delete();
        return $this->sendSuccess('Paid Service deleted successfully');
    }
}