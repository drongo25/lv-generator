<?php

namespace App\Http\Controllers;

use App\Models\CouponPivotIncludeRoomType;
use App\Http\Requests\CreateCouponPivotIncludeRoomTypeRequest;
use App\Http\Requests\UpdateCouponPivotIncludeRoomTypeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponPivotIncludeRoomTypeController extends Controller
{
    public function index(Request $request)
    {
        $couponPivotIncludeRoomTypes = CouponPivotIncludeRoomType::paginate(15);
        return view('coupon_pivot_include_room_types.index', compact('couponPivotIncludeRoomTypes'));
    }

    public function create()
    {
        // FIX: передаём пустую модель — _fields использует $couponPivotIncludeRoomType->field ?? ''
        $couponPivotIncludeRoomType = new CouponPivotIncludeRoomType();
        return view('coupon_pivot_include_room_types.create', compact('couponPivotIncludeRoomType'));
    }

    public function store(CreateCouponPivotIncludeRoomTypeRequest $request)
    {
        CouponPivotIncludeRoomType::create($request->validated());
        return redirect()->route('coupon-pivot-include-room-types.index')
            ->with('success', 'CouponPivotIncludeRoomType created successfully.');
    }

    public function show($id)
    {
        $couponPivotIncludeRoomType = CouponPivotIncludeRoomType::findOrFail($id);
        return view('coupon_pivot_include_room_types.show', compact('couponPivotIncludeRoomType'));
    }

    public function edit($id)
    {
        $couponPivotIncludeRoomType = CouponPivotIncludeRoomType::findOrFail($id);
        return view('coupon_pivot_include_room_types.edit', compact('couponPivotIncludeRoomType'));
    }

    // FIX: исправлен порядок параметров — Request всегда первым
    public function update(UpdateCouponPivotIncludeRoomTypeRequest $request, $id)
    {
        $couponPivotIncludeRoomType = CouponPivotIncludeRoomType::findOrFail($id);
        $couponPivotIncludeRoomType->update($request->validated());
        return redirect()->route('coupon-pivot-include-room-types.index')
            ->with('success', 'CouponPivotIncludeRoomType updated successfully.');
    }

    public function destroy($id)
    {
        CouponPivotIncludeRoomType::findOrFail($id)->delete();
        return redirect()->route('coupon-pivot-include-room-types.index')
            ->with('success', 'CouponPivotIncludeRoomType deleted successfully.');
    }
}