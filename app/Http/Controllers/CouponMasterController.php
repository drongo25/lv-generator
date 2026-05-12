<?php

namespace App\Http\Controllers;

use App\Models\CouponMaster;
use App\Http\Requests\CreateCouponMasterRequest;
use App\Http\Requests\UpdateCouponMasterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponMasterController extends Controller
{
    public function index(Request $request)
    {
        $couponMasters = CouponMaster::paginate(15);
        return view('coupon_masters.index', compact('couponMasters'));
    }

    public function create()
    {
        // FIX: передаём пустую модель — _fields использует $couponMaster->field ?? ''
        $couponMaster = new CouponMaster();
        return view('coupon_masters.create', compact('couponMaster'));
    }

    public function store(CreateCouponMasterRequest $request)
    {
        CouponMaster::create($request->validated());
        return redirect()->route('coupon-masters.index')
            ->with('success', 'CouponMaster created successfully.');
    }

    public function show($id)
    {
        $couponMaster = CouponMaster::findOrFail($id);
        return view('coupon_masters.show', compact('couponMaster'));
    }

    public function edit($id)
    {
        $couponMaster = CouponMaster::findOrFail($id);
        return view('coupon_masters.edit', compact('couponMaster'));
    }

    // FIX: исправлен порядок параметров — Request всегда первым
    public function update(UpdateCouponMasterRequest $request, $id)
    {
        $couponMaster = CouponMaster::findOrFail($id);
        $couponMaster->update($request->validated());
        return redirect()->route('coupon-masters.index')
            ->with('success', 'CouponMaster updated successfully.');
    }

    public function destroy($id)
    {
        CouponMaster::findOrFail($id)->delete();
        return redirect()->route('coupon-masters.index')
            ->with('success', 'CouponMaster deleted successfully.');
    }
}