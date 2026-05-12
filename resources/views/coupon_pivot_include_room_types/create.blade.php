@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header"><h4 class="mb-0">Create Coupon Pivot Include Room Type</h4></div>
            <div class="card-body">
                <form action="{{ route('coupon-pivot-include-room-types.store') }}" method="POST">
                    @csrf
                    @include('coupon_pivot_include_room_types._fields')
                    <div class="d-flex gap-2 mt-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('coupon-pivot-include-room-types.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection