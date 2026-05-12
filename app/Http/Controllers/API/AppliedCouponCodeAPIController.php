<?php

namespace App\Http\Controllers\API;

use App\Models\AppliedCouponCode;
use App\Http\Requests\API\CreateAppliedCouponCodeAPIRequest;
use App\Http\Requests\API\UpdateAppliedCouponCodeAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AppliedCouponCodeAPIController extends AppBaseController
{
    /**
     * Display a listing of the AppliedCouponCode.
     * GET /api/applied_coupon_codes
     */
    public function index(Request $request): JsonResponse
    {
        $query = AppliedCouponCode::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Applied Coupon Codes retrieved successfully');
    }

    /**
     * Store a newly created AppliedCouponCode.
     * POST /api/applied_coupon_codes
     */
    public function store(CreateAppliedCouponCodeAPIRequest $request): JsonResponse
    {
        $appliedCouponCode = AppliedCouponCode::create($request->all());
        return $this->sendResponse($appliedCouponCode->toArray(), 'Applied Coupon Code saved successfully');
    }

    /**
     * Display the specified AppliedCouponCode.
     * GET /api/applied_coupon_codes/{id}
     */
    public function show(int $id): JsonResponse
    {
        $appliedCouponCode = AppliedCouponCode::find($id);
        if (empty($appliedCouponCode)) {
            return $this->sendError('Applied Coupon Code not found');
        }
        return $this->sendResponse($appliedCouponCode->toArray(), 'Applied Coupon Code retrieved successfully');
    }

    /**
     * Update the specified AppliedCouponCode.
     * PUT /api/applied_coupon_codes/{id}
     */
    public function update(int $id, UpdateAppliedCouponCodeAPIRequest $request): JsonResponse
    {
        $appliedCouponCode = AppliedCouponCode::find($id);
        if (empty($appliedCouponCode)) {
            return $this->sendError('Applied Coupon Code not found');
        }
        $appliedCouponCode->fill($request->all())->save();
        return $this->sendResponse($appliedCouponCode->toArray(), 'Applied Coupon Code updated successfully');
    }

    /**
     * Remove the specified AppliedCouponCode.
     * DELETE /api/applied_coupon_codes/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $appliedCouponCode = AppliedCouponCode::find($id);
        if (empty($appliedCouponCode)) {
            return $this->sendError('Applied Coupon Code not found');
        }
        $appliedCouponCode->delete();
        return $this->sendSuccess('Applied Coupon Code deleted successfully');
    }
}