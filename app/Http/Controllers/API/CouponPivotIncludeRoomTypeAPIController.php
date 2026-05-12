<?php

namespace App\Http\Controllers\API;

use App\Models\CouponPivotIncludeRoomType;
use App\Http\Requests\API\CreateCouponPivotIncludeRoomTypeAPIRequest;
use App\Http\Requests\API\UpdateCouponPivotIncludeRoomTypeAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CouponPivotIncludeRoomTypeAPIController extends AppBaseController
{
    /**
     * Display a listing of the CouponPivotIncludeRoomType.
     * GET /api/coupon_pivot_include_room_type
     */
    public function index(Request $request): JsonResponse
    {
        $query = CouponPivotIncludeRoomType::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Coupon Pivot Include Room Types retrieved successfully');
    }

    /**
     * Store a newly created CouponPivotIncludeRoomType.
     * POST /api/coupon_pivot_include_room_type
     */
    public function store(CreateCouponPivotIncludeRoomTypeAPIRequest $request): JsonResponse
    {
        $couponPivotIncludeRoomType = CouponPivotIncludeRoomType::create($request->all());
        return $this->sendResponse($couponPivotIncludeRoomType->toArray(), 'Coupon Pivot Include Room Type saved successfully');
    }

    /**
     * Display the specified CouponPivotIncludeRoomType.
     * GET /api/coupon_pivot_include_room_type/{id}
     */
    public function show(int $id): JsonResponse
    {
        $couponPivotIncludeRoomType = CouponPivotIncludeRoomType::find($id);
        if (empty($couponPivotIncludeRoomType)) {
            return $this->sendError('Coupon Pivot Include Room Type not found');
        }
        return $this->sendResponse($couponPivotIncludeRoomType->toArray(), 'Coupon Pivot Include Room Type retrieved successfully');
    }

    /**
     * Update the specified CouponPivotIncludeRoomType.
     * PUT /api/coupon_pivot_include_room_type/{id}
     */
    public function update(int $id, UpdateCouponPivotIncludeRoomTypeAPIRequest $request): JsonResponse
    {
        $couponPivotIncludeRoomType = CouponPivotIncludeRoomType::find($id);
        if (empty($couponPivotIncludeRoomType)) {
            return $this->sendError('Coupon Pivot Include Room Type not found');
        }
        $couponPivotIncludeRoomType->fill($request->all())->save();
        return $this->sendResponse($couponPivotIncludeRoomType->toArray(), 'Coupon Pivot Include Room Type updated successfully');
    }

    /**
     * Remove the specified CouponPivotIncludeRoomType.
     * DELETE /api/coupon_pivot_include_room_type/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $couponPivotIncludeRoomType = CouponPivotIncludeRoomType::find($id);
        if (empty($couponPivotIncludeRoomType)) {
            return $this->sendError('Coupon Pivot Include Room Type not found');
        }
        $couponPivotIncludeRoomType->delete();
        return $this->sendSuccess('Coupon Pivot Include Room Type deleted successfully');
    }
}