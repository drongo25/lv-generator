@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Room Types</h1>
    <a href="{{ route('room-types.create') }}" class="btn btn-primary">+ Add New</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Short Code</th>
                <th>Description</th>
                <th>Base Capacity</th>
                <th>Higher Capacity</th>
                <th>Extra Bed</th>
                <th>Kids Capacity</th>
                <th>Base Price</th>
                <th>Additional Person Price</th>
                <th>Extra Bed Price</th>
                <th>Status</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roomTypes as $roomType)
                    <tr>
                <td>{{ $roomType->title }}</td>
                <td>{{ $roomType->slug }}</td>
                <td>{{ $roomType->short_code }}</td>
                <td>{{ $roomType->description }}</td>
                <td>{{ $roomType->base_capacity }}</td>
                <td>{{ $roomType->higher_capacity }}</td>
                <td>{{ $roomType->extra_bed }}</td>
                <td>{{ $roomType->kids_capacity }}</td>
                <td>{{ $roomType->base_price }}</td>
                <td>{{ $roomType->additional_person_price }}</td>
                <td>{{ $roomType->extra_bed_price }}</td>
                <td>{{ $roomType->status }}</td>
                        <td>
                            <a href="{{ route('room-types.show', $roomType->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('room-types.edit', $roomType->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('room-types.destroy', $roomType->id) }}"
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

<div class="mt-3">{{ $roomTypes->links() }}</div>
@endsection