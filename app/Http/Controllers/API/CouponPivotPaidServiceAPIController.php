<?php

namespace App\Http\Controllers\API;

use App\Models\CouponPivotPaidService;
use App\Http\Requests\API\CreateCouponPivotPaidServiceAPIRequest;
use App\Http\Requests\API\UpdateCouponPivotPaidServiceAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CouponPivotPaidServiceAPIController extends AppBaseController
{
    /**
     * Display a listing of the CouponPivotPaidService.
     * GET /api/coupon_pivot_paid_service
     */
    public function index(Request $request): JsonResponse
    {
        $query = CouponPivotPaidService::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Coupon Pivot Paid Services retrieved successfully');
    }

    /**
     * Store a newly created CouponPivotPaidService.
     * POST /api/coupon_pivot_paid_service
     */
    public function store(CreateCouponPivotPaidServiceAPIRequest $request): JsonResponse
    {
        $couponPivotPaidService = CouponPivotPaidService::create($request->all());
        return $this->sendResponse($couponPivotPaidService->toArray(), 'Coupon Pivot Paid Service saved successfully');
    }

    /**
     * Display the specified CouponPivotPaidService.
     * GET /api/coupon_pivot_paid_service/{id}
     */
    public function show(int $id): JsonResponse
    {
        $couponPivotPaidService = CouponPivotPaidService::find($id);
        if (empty($couponPivotPaidService)) {
            return $this->sendError('Coupon Pivot Paid Service not found');
        }
        return $this->sendResponse($couponPivotPaidService->toArray(), 'Coupon Pivot Paid Service retrieved successfully');
    }

    /**
     * Update the specified CouponPivotPaidService.
     * PUT /api/coupon_pivot_paid_service/{id}
     */
    public function update(int $id, UpdateCouponPivotPaidServiceAPIRequest $request): JsonResponse
    {
        $couponPivotPaidService = CouponPivotPaidService::find($id);
        if (empty($couponPivotPaidService)) {
            return $this->sendError('Coupon Pivot Paid Service not found');
        }
        $couponPivotPaidService->fill($request->all())->save();
        return $this->sendResponse($couponPivotPaidService->toArray(), 'Coupon Pivot Paid Service updated successfully');
    }

    /**
     * Remove the specified CouponPivotPaidService.
     * DELETE /api/coupon_pivot_paid_service/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $couponPivotPaidService = CouponPivotPaidService::find($id);
        if (empty($couponPivotPaidService)) {
            return $this->sendError('Coupon Pivot Paid Service not found');
        }
        $couponPivotPaidService->delete();
        return $this->sendSuccess('Coupon Pivot Paid Service deleted successfully');
    }
}