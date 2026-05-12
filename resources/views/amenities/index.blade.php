@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Amenities</h1>
    <a href="{{ route('amenities.create') }}" class="btn btn-primary">+ Add New</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Status</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($amenities as $amenity)
                    <tr>
                <td>{{ $amenity->name }}</td>
                <td>{{ $amenity->image }}</td>
                <td>{{ $amenity->description }}</td>
                <td>{{ $amenity->status }}</td>
                        <td>
                            <a href="{{ route('amenities.show', $amenity->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('amenities.edit', $amenity->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('amenities.destroy', $amenity->id) }}"
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

<div class="mt-3">{{ $amenities->links() }}</div>
@endsection