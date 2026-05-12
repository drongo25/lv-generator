@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Room Type Pivot Amenities</h1>
    <a href="{{ route('room-type-pivot-amenities.create') }}" class="btn btn-primary">+ Add New</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                <th>Room Type Id</th>
                <th>Amenity Id</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roomTypePivotAmenities as $roomTypePivotAmenity)
                    <tr>
                <td>{{ $roomTypePivotAmenity->room_type_id }}</td>
                <td>{{ $roomTypePivotAmenity->amenity_id }}</td>
                        <td>
                            <a href="{{ route('room-type-pivot-amenities.show', $roomTypePivotAmenity->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('room-type-pivot-amenities.edit', $roomTypePivotAmenity->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('room-type-pivot-amenities.destroy', $roomTypePivotAmenity->id) }}"
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

<div class="mt-3">{{ $roomTypePivotAmenities->links() }}</div>
@endsection