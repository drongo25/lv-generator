@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Coupon Pivot Include Room Types</h1>
    <a href="{{ route('coupon-pivot-include-room-types.create') }}" class="btn btn-primary">+ Add New</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                <th>Coupon Id</th>
                <th>Room Type Id</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($couponPivotIncludeRoomTypes as $couponPivotIncludeRoomType)
                    <tr>
                <td>{{ $couponPivotIncludeRoomType->coupon_id }}</td>
                <td>{{ $couponPivotIncludeRoomType->room_type_id }}</td>
                        <td>
                            <a href="{{ route('coupon-pivot-include-room-types.show', $couponPivotIncludeRoomType->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('coupon-pivot-include-room-types.edit', $couponPivotIncludeRoomType->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('coupon-pivot-include-room-types.destroy', $couponPivotIncludeRoomType->id) }}"
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

<div class="mt-3">{{ $couponPivotIncludeRoomTypes->links() }}</div>
@endsection