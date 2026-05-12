<?php

namespace App\Http\Controllers\API;

use App\Models\CouponMaster;
use App\Http\Requests\API\CreateCouponMasterAPIRequest;
use App\Http\Requests\API\UpdateCouponMasterAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CouponMasterAPIController extends AppBaseController
{
    /**
     * Display a listing of the CouponMaster.
     * GET /api/coupon_masters
     */
    public function index(Request $request): JsonResponse
    {
        $query = CouponMaster::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Coupon Masters retrieved successfully');
    }

    /**
     * Store a newly created CouponMaster.
     * POST /api/coupon_masters
     */
    public function store(CreateCouponMasterAPIRequest $request): JsonResponse
    {
        $couponMaster = CouponMaster::create($request->all());
        return $this->sendResponse($couponMaster->toArray(), 'Coupon Master saved successfully');
    }

    /**
     * Display the specified CouponMaster.
     * GET /api/coupon_masters/{id}
     */
    public function show(int $id): JsonResponse
    {
        $couponMaster = CouponMaster::find($id);
        if (empty($couponMaster)) {
            return $this->sendError('Coupon Master not found');
        }
        return $this->sendResponse($couponMaster->toArray(), 'Coupon Master retrieved successfully');
    }

    /**
     * Update the specified CouponMaster.
     * PUT /api/coupon_masters/{id}
     */
    public function update(int $id, UpdateCouponMasterAPIRequest $request): JsonResponse
    {
        $couponMaster = CouponMaster::find($id);
        if (empty($couponMaster)) {
            return $this->sendError('Coupon Master not found');
        }
        $couponMaster->fill($request->all())->save();
        return $this->sendResponse($couponMaster->toArray(), 'Coupon Master updated successfully');
    }

    /**
     * Remove the specified CouponMaster.
     * DELETE /api/coupon_masters/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $couponMaster = CouponMaster::find($id);
        if (empty($couponMaster)) {
            return $this->sendError('Coupon Master not found');
        }
        $couponMaster->delete();
        return $this->sendSuccess('Coupon Master deleted successfully');
    }
}