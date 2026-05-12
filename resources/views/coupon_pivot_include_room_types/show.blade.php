@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Coupon Pivot Include Room Type Details</h4>
                <a href="{{ route('coupon-pivot-include-room-types.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
        <tr>
            <th class="w-25">{{ __('coupon_id') }}</th>
            <td>{{ $couponPivotIncludeRoomType->coupon_id }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('room_type_id') }}</th>
            <td>{{ $couponPivotIncludeRoomType->room_type_id }}</td>
        </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('coupon-pivot-include-room-types.edit', $couponPivotIncludeRoomType->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('coupon-pivot-include-room-types.destroy', $couponPivotIncludeRoomType->id) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection