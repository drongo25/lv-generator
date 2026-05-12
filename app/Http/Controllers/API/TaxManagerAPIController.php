<?php

namespace App\Http\Controllers\API;

use App\Models\TaxManager;
use App\Http\Requests\API\CreateTaxManagerAPIRequest;
use App\Http\Requests\API\UpdateTaxManagerAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaxManagerAPIController extends AppBaseController
{
    /**
     * Display a listing of the TaxManager.
     * GET /api/tax_managers
     */
    public function index(Request $request): JsonResponse
    {
        $query = TaxManager::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Tax Managers retrieved successfully');
    }

    /**
     * Store a newly created TaxManager.
     * POST /api/tax_managers
     */
    public function store(CreateTaxManagerAPIRequest $request): JsonResponse
    {
        $taxManager = TaxManager::create($request->all());
        return $this->sendResponse($taxManager->toArray(), 'Tax Manager saved successfully');
    }

    /**
     * Display the specified TaxManager.
     * GET /api/tax_managers/{id}
     */
    public function show(int $id): JsonResponse
    {
        $taxManager = TaxManager::find($id);
        if (empty($taxManager)) {
            return $this->sendError('Tax Manager not found');
        }
        return $this->sendResponse($taxManager->toArray(), 'Tax Manager retrieved successfully');
    }

    /**
     * Update the specified TaxManager.
     * PUT /api/tax_managers/{id}
     */
    public function update(int $id, UpdateTaxManagerAPIRequest $request): JsonResponse
    {
        $taxManager = TaxManager::find($id);
        if (empty($taxManager)) {
            return $this->sendError('Tax Manager not found');
        }
        $taxManager->fill($request->all())->save();
        return $this->sendResponse($taxManager->toArray(), 'Tax Manager updated successfully');
    }

    /**
     * Remove the specified TaxManager.
     * DELETE /api/tax_managers/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $taxManager = TaxManager::find($id);
        if (empty($taxManager)) {
            return $this->sendError('Tax Manager not found');
        }
        $taxManager->delete();
        return $this->sendSuccess('Tax Manager deleted successfully');
    }
}