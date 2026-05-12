@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Rooms</h1>
    <a href="{{ route('rooms.create') }}" class="btn btn-primary">+ Add New</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                <th>Room Type Id</th>
                <th>Floor Id</th>
                <th>Image</th>
                <th>Number</th>
                <th>Status</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rooms as $room)
                    <tr>
                <td>{{ $room->room_type_id }}</td>
                <td>{{ $room->floor_id }}</td>
                <td>{{ $room->image }}</td>
                <td>{{ $room->number }}</td>
                <td>{{ $room->status }}</td>
                        <td>
                            <a href="{{ route('rooms.show', $room->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('rooms.edit', $room->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('rooms.destroy', $room->id) }}"
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

<div class="mt-3">{{ $rooms->links() }}</div>
@endsection