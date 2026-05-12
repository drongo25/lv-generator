@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Coupon Master Details</h4>
                <a href="{{ route('coupon-masters.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
        <tr>
            <th class="w-25">{{ __('offer_title') }}</th>
            <td>{{ $couponMaster->offer_title }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('description') }}</th>
            <td>{{ $couponMaster->description }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('image') }}</th>
            <td>{{ $couponMaster->image }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('period_start_time') }}</th>
            <td>{{ $couponMaster->period_start_time }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('period_end_time') }}</th>
            <td>{{ $couponMaster->period_end_time }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('code') }}</th>
            <td>{{ $couponMaster->code }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('type') }}</th>
            <td>{{ $couponMaster->type }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('value') }}</th>
            <td>{{ $couponMaster->value }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('min_amount') }}</th>
            <td>{{ $couponMaster->min_amount }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('max_amount') }}</th>
            <td>{{ $couponMaster->max_amount }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('limit_per_user') }}</th>
            <td>{{ $couponMaster->limit_per_user }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('limit_per_coupon') }}</th>
            <td>{{ $couponMaster->limit_per_coupon }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('status') }}</th>
            <td>{{ $couponMaster->status }}</td>
        </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('coupon-masters.edit', $couponMaster->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('coupon-masters.destroy', $couponMaster->id) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection