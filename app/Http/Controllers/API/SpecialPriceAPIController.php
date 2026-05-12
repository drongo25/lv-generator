<?php

namespace App\Http\Controllers\API;

use App\Models\SpecialPrice;
use App\Http\Requests\API\CreateSpecialPriceAPIRequest;
use App\Http\Requests\API\UpdateSpecialPriceAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SpecialPriceAPIController extends AppBaseController
{
    /**
     * Display a listing of the SpecialPrice.
     * GET /api/special_prices
     */
    public function index(Request $request): JsonResponse
    {
        $query = SpecialPrice::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Special Prices retrieved successfully');
    }

    /**
     * Store a newly created SpecialPrice.
     * POST /api/special_prices
     */
    public function store(CreateSpecialPriceAPIRequest $request): JsonResponse
    {
        $specialPrice = SpecialPrice::create($request->all());
        return $this->sendResponse($specialPrice->toArray(), 'Special Price saved successfully');
    }

    /**
     * Display the specified SpecialPrice.
     * GET /api/special_prices/{id}
     */
    public function show(int $id): JsonResponse
    {
        $specialPrice = SpecialPrice::find($id);
        if (empty($specialPrice)) {
            return $this->sendError('Special Price not found');
        }
        return $this->sendResponse($specialPrice->toArray(), 'Special Price retrieved successfully');
    }

    /**
     * Update the specified SpecialPrice.
     * PUT /api/special_prices/{id}
     */
    public function update(int $id, UpdateSpecialPriceAPIRequest $request): JsonResponse
    {
        $specialPrice = SpecialPrice::find($id);
        if (empty($specialPrice)) {
            return $this->sendError('Special Price not found');
        }
        $specialPrice->fill($request->all())->save();
        return $this->sendResponse($specialPrice->toArray(), 'Special Price updated successfully');
    }

    /**
     * Remove the specified SpecialPrice.
     * DELETE /api/special_prices/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $specialPrice = SpecialPrice::find($id);
        if (empty($specialPrice)) {
            return $this->sendError('Special Price not found');
        }
        $specialPrice->delete();
        return $this->sendSuccess('Special Price deleted successfully');
    }
}