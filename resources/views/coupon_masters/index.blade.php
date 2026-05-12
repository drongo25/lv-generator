@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Coupon Masters</h1>
    <a href="{{ route('coupon-masters.create') }}" class="btn btn-primary">+ Add New</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                <th>Offer Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Period Start Time</th>
                <th>Period End Time</th>
                <th>Code</th>
                <th>Type</th>
                <th>Value</th>
                <th>Min Amount</th>
                <th>Max Amount</th>
                <th>Limit Per User</th>
                <th>Limit Per Coupon</th>
                <th>Status</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($couponMasters as $couponMaster)
                    <tr>
                <td>{{ $couponMaster->offer_title }}</td>
                <td>{{ $couponMaster->description }}</td>
                <td>{{ $couponMaster->image }}</td>
                <td>{{ $couponMaster->period_start_time }}</td>
                <td>{{ $couponMaster->period_end_time }}</td>
                <td>{{ $couponMaster->code }}</td>
                <td>{{ $couponMaster->type }}</td>
                <td>{{ $couponMaster->value }}</td>
                <td>{{ $couponMaster->min_amount }}</td>
                <td>{{ $couponMaster->max_amount }}</td>
                <td>{{ $couponMaster->limit_per_user }}</td>
                <td>{{ $couponMaster->limit_per_coupon }}</td>
                <td>{{ $couponMaster->status }}</td>
                        <td>
                            <a href="{{ route('coupon-masters.show', $couponMaster->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('coupon-masters.edit', $couponMaster->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('coupon-masters.destroy', $couponMaster->id) }}"
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

<div class="mt-3">{{ $couponMasters->links() }}</div>
@endsection