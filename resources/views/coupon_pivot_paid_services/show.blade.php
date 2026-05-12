@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Coupon Pivot Paid Service Details</h4>
                <a href="{{ route('coupon-pivot-paid-services.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
        <tr>
            <th class="w-25">{{ __('coupon_id') }}</th>
            <td>{{ $couponPivotPaidService->coupon_id }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('paid_service_id') }}</th>
            <td>{{ $couponPivotPaidService->paid_service_id }}</td>
        </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('coupon-pivot-paid-services.edit', $couponPivotPaidService->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('coupon-pivot-paid-services.destroy', $couponPivotPaidService->id) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection