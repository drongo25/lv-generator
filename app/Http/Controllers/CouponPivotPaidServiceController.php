<?php

namespace App\Http\Controllers;

use App\Models\CouponPivotPaidService;
use App\Http\Requests\CreateCouponPivotPaidServiceRequest;
use App\Http\Requests\UpdateCouponPivotPaidServiceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponPivotPaidServiceController extends Controller
{
    public function index(Request $request)
    {
        $couponPivotPaidServices = CouponPivotPaidService::paginate(15);
        return view('coupon_pivot_paid_services.index', compact('couponPivotPaidServices'));
    }

    public function create()
    {
        return view('coupon_pivot_paid_services.create');
    }

    public function store(CreateCouponPivotPaidServiceRequest $request)
    {
        CouponPivotPaidService::create($request->validated());
        return redirect()->route('coupon-pivot-paid-services.index')
            ->with('success', 'CouponPivotPaidService created successfully.');
    }

    public function show($id)
    {
        $couponPivotPaidService = CouponPivotPaidService::findOrFail($id);
        return view('coupon_pivot_paid_services.show', compact('couponPivotPaidService'));
    }

    public function edit($id)
    {
        $couponPivotPaidService = CouponPivotPaidService::findOrFail($id);
        return view('coupon_pivot_paid_services.edit', compact('couponPivotPaidService'));
    }

    public function update($id, UpdateCouponPivotPaidServiceRequest $request)
    {
        $couponPivotPaidService = CouponPivotPaidService::findOrFail($id);
        $couponPivotPaidService->update($request->validated());
        return redirect()->route('coupon-pivot-paid-services.index')
            ->with('success', 'CouponPivotPaidService updated successfully.');
    }

    public function destroy($id)
    {
        CouponPivotPaidService::findOrFail($id)->delete();
        return redirect()->route('coupon-pivot-paid-services.index')
            ->with('success', 'CouponPivotPaidService deleted successfully.');
    }
}