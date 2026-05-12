@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header"><h4 class="mb-0">Create Room Type Pivot Amenity</h4></div>
            <div class="card-body">
                <form action="{{ route('room-type-pivot-amenities.store') }}" method="POST">
                    @csrf
                    @include('room_type_pivot_amenities._fields')
                    <div class="d-flex gap-2 mt-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('room-type-pivot-amenities.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection