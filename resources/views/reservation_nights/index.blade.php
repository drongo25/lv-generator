@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Reservation Nights</h1>
    <a href="{{ route('reservation-nights.create') }}" class="btn btn-primary">+ Add New</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                <th>Reservation Id</th>
                <th>Room Id</th>
                <th>Date</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Price</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reservationNights as $reservationNight)
                    <tr>
                <td>{{ $reservationNight->reservation_id }}</td>
                <td>{{ $reservationNight->room_id }}</td>
                <td>{{ $reservationNight->date }}</td>
                <td>{{ $reservationNight->check_in }}</td>
                <td>{{ $reservationNight->check_out }}</td>
                <td>{{ $reservationNight->price }}</td>
                        <td>
                            <a href="{{ route('reservation-nights.show', $reservationNight->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('reservation-nights.edit', $reservationNight->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('reservation-nights.destroy', $reservationNight->id) }}"
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

<div class="mt-3">{{ $reservationNights->links() }}</div>
@endsection