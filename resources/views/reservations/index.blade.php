@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Reservations</h1>
    <a href="{{ route('reservations.create') }}" class="btn btn-primary">+ Add New</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                <th>Uid</th>
                <th>Date</th>
                <th>User Id</th>
                <th>Room Type Id</th>
                <th>Adults</th>
                <th>Kids</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Number Of Room</th>
                <th>Status</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reservations as $reservation)
                    <tr>
                <td>{{ $reservation->uid }}</td>
                <td>{{ $reservation->date }}</td>
                <td>{{ $reservation->user_id }}</td>
                <td>{{ $reservation->room_type_id }}</td>
                <td>{{ $reservation->adults }}</td>
                <td>{{ $reservation->kids }}</td>
                <td>{{ $reservation->check_in }}</td>
                <td>{{ $reservation->check_out }}</td>
                <td>{{ $reservation->number_of_room }}</td>
                <td>{{ $reservation->status }}</td>
                        <td>
                            <a href="{{ route('reservations.show', $reservation->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('reservations.edit', $reservation->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('reservations.destroy', $reservation->id) }}"
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

<div class="mt-3">{{ $reservations->links() }}</div>
@endsection