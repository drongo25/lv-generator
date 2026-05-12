<?php

namespace App\Http\Controllers;

use App\Models\AppliedCouponCode;
use App\Http\Requests\CreateAppliedCouponCodeRequest;
use App\Http\Requests\UpdateAppliedCouponCodeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppliedCouponCodeController extends Controller
{
    public function index(Request $request)
    {
        $appliedCouponCodes = AppliedCouponCode::paginate(15);
        return view('applied_coupon_codes.index', compact('appliedCouponCodes'));
    }

    public function create()
    {
        // FIX: передаём пустую модель — _fields использует $appliedCouponCode->field ?? ''
        $appliedCouponCode = new AppliedCouponCode();
        return view('applied_coupon_codes.create', compact('appliedCouponCode'));
    }

    public function store(CreateAppliedCouponCodeRequest $request)
    {
        AppliedCouponCode::create($request->validated());
        return redirect()->route('applied-coupon-codes.index')
            ->with('success', 'AppliedCouponCode created successfully.');
    }

    public function show($id)
    {
        $appliedCouponCode = AppliedCouponCode::findOrFail($id);
        return view('applied_coupon_codes.show', compact('appliedCouponCode'));
    }

    public function edit($id)
    {
        $appliedCouponCode = AppliedCouponCode::findOrFail($id);
        return view('applied_coupon_codes.edit', compact('appliedCouponCode'));
    }

    // FIX: исправлен порядок параметров — Request всегда первым
    public function update(UpdateAppliedCouponCodeRequest $request, $id)
    {
        $appliedCouponCode = AppliedCouponCode::findOrFail($id);
        $appliedCouponCode->update($request->validated());
        return redirect()->route('applied-coupon-codes.index')
            ->with('success', 'AppliedCouponCode updated successfully.');
    }

    public function destroy($id)
    {
        AppliedCouponCode::findOrFail($id)->delete();
        return redirect()->route('applied-coupon-codes.index')
            ->with('success', 'AppliedCouponCode deleted successfully.');
    }
}