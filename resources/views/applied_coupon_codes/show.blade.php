@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Applied Coupon Code Details</h4>
                <a href="{{ route('applied-coupon-codes.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
        <tr>
            <th class="w-25">{{ __('reservation_id') }}</th>
            <td>{{ $appliedCouponCode->reservation_id }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('coupon_id') }}</th>
            <td>{{ $appliedCouponCode->coupon_id }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('user_id') }}</th>
            <td>{{ $appliedCouponCode->user_id }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('date') }}</th>
            <td>{{ $appliedCouponCode->date }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('status') }}</th>
            <td>{{ $appliedCouponCode->status }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('coupon_type') }}</th>
            <td>{{ $appliedCouponCode->coupon_type }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('coupon_rate') }}</th>
            <td>{{ $appliedCouponCode->coupon_rate }}</td>
        </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('applied-coupon-codes.edit', $appliedCouponCode->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('applied-coupon-codes.destroy', $appliedCouponCode->id) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection