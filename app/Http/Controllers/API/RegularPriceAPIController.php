<?php

namespace App\Http\Controllers\API;

use App\Models\RegularPrice;
use App\Http\Requests\API\CreateRegularPriceAPIRequest;
use App\Http\Requests\API\UpdateRegularPriceAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegularPriceAPIController extends AppBaseController
{
    /**
     * Display a listing of the RegularPrice.
     * GET /api/regular_prices
     */
    public function index(Request $request): JsonResponse
    {
        $query = RegularPrice::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Regular Prices retrieved successfully');
    }

    /**
     * Store a newly created RegularPrice.
     * POST /api/regular_prices
     */
    public function store(CreateRegularPriceAPIRequest $request): JsonResponse
    {
        $regularPrice = RegularPrice::create($request->all());
        return $this->sendResponse($regularPrice->toArray(), 'Regular Price saved successfully');
    }

    /**
     * Display the specified RegularPrice.
     * GET /api/regular_prices/{id}
     */
    public function show(int $id): JsonResponse
    {
        $regularPrice = RegularPrice::find($id);
        if (empty($regularPrice)) {
            return $this->sendError('Regular Price not found');
        }
        return $this->sendResponse($regularPrice->toArray(), 'Regular Price retrieved successfully');
    }

    /**
     * Update the specified RegularPrice.
     * PUT /api/regular_prices/{id}
     */
    public function update(int $id, UpdateRegularPriceAPIRequest $request): JsonResponse
    {
        $regularPrice = RegularPrice::find($id);
        if (empty($regularPrice)) {
            return $this->sendError('Regular Price not found');
        }
        $regularPrice->fill($request->all())->save();
        return $this->sendResponse($regularPrice->toArray(), 'Regular Price updated successfully');
    }

    /**
     * Remove the specified RegularPrice.
     * DELETE /api/regular_prices/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $regularPrice = RegularPrice::find($id);
        if (empty($regularPrice)) {
            return $this->sendError('Regular Price not found');
        }
        $regularPrice->delete();
        return $this->sendSuccess('Regular Price deleted successfully');
    }
}