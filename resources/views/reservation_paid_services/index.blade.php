@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Reservation Paid Services</h1>
    <a href="{{ route('reservation-paid-services.create') }}" class="btn btn-primary">+ Add New</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                <th>Reservation Id</th>
                <th>Pad Service Id</th>
                <th>Price Type</th>
                <th>Value</th>
                <th>Price</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reservationPaidServices as $reservationPaidService)
                    <tr>
                <td>{{ $reservationPaidService->reservation_id }}</td>
                <td>{{ $reservationPaidService->pad_service_id }}</td>
                <td>{{ $reservationPaidService->price_type }}</td>
                <td>{{ $reservationPaidService->value }}</td>
                <td>{{ $reservationPaidService->price }}</td>
                        <td>
                            <a href="{{ route('reservation-paid-services.show', $reservationPaidService->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('reservation-paid-services.edit', $reservationPaidService->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('reservation-paid-services.destroy', $reservationPaidService->id) }}"
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

<div class="mt-3">{{ $reservationPaidServices->links() }}</div>
@endsection