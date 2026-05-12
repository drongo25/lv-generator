<?php

namespace App\Http\Controllers\API;

use App\Models\Gateway;
use App\Http\Requests\API\CreateGatewayAPIRequest;
use App\Http\Requests\API\UpdateGatewayAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GatewayAPIController extends AppBaseController
{
    /**
     * Display a listing of the Gateway.
     * GET /api/gateways
     */
    public function index(Request $request): JsonResponse
    {
        $query = Gateway::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Gateways retrieved successfully');
    }

    /**
     * Store a newly created Gateway.
     * POST /api/gateways
     */
    public function store(CreateGatewayAPIRequest $request): JsonResponse
    {
        $gateway = Gateway::create($request->all());
        return $this->sendResponse($gateway->toArray(), 'Gateway saved successfully');
    }

    /**
     * Display the specified Gateway.
     * GET /api/gateways/{id}
     */
    public function show(int $id): JsonResponse
    {
        $gateway = Gateway::find($id);
        if (empty($gateway)) {
            return $this->sendError('Gateway not found');
        }
        return $this->sendResponse($gateway->toArray(), 'Gateway retrieved successfully');
    }

    /**
     * Update the specified Gateway.
     * PUT /api/gateways/{id}
     */
    public function update(int $id, UpdateGatewayAPIRequest $request): JsonResponse
    {
        $gateway = Gateway::find($id);
        if (empty($gateway)) {
            return $this->sendError('Gateway not found');
        }
        $gateway->fill($request->all())->save();
        return $this->sendResponse($gateway->toArray(), 'Gateway updated successfully');
    }

    /**
     * Remove the specified Gateway.
     * DELETE /api/gateways/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $gateway = Gateway::find($id);
        if (empty($gateway)) {
            return $this->sendError('Gateway not found');
        }
        $gateway->delete();
        return $this->sendSuccess('Gateway deleted successfully');
    }
}