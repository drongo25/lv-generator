@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Applied Coupon Codes</h1>
    <a href="{{ route('applied-coupon-codes.create') }}" class="btn btn-primary">+ Add New</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                <th>Reservation Id</th>
                <th>Coupon Id</th>
                <th>User Id</th>
                <th>Date</th>
                <th>Status</th>
                <th>Coupon Type</th>
                <th>Coupon Rate</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appliedCouponCodes as $appliedCouponCode)
                    <tr>
                <td>{{ $appliedCouponCode->reservation_id }}</td>
                <td>{{ $appliedCouponCode->coupon_id }}</td>
                <td>{{ $appliedCouponCode->user_id }}</td>
                <td>{{ $appliedCouponCode->date }}</td>
                <td>{{ $appliedCouponCode->status }}</td>
                <td>{{ $appliedCouponCode->coupon_type }}</td>
                <td>{{ $appliedCouponCode->coupon_rate }}</td>
                        <td>
                            <a href="{{ route('applied-coupon-codes.show', $appliedCouponCode->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('applied-coupon-codes.edit', $appliedCouponCode->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('applied-coupon-codes.destroy', $appliedCouponCode->id) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="99" class="text-center text-muted py-4">No records found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-3">{{ $appliedCouponCodes->links() }}</div>
@endsection