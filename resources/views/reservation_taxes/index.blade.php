@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Reservation Taxes</h1>
    <a href="{{ route('reservation-taxes.create') }}" class="btn btn-primary">+ Add New</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                <th>Reservation Id</th>
                <th>Tax Id</th>
                <th>Type</th>
                <th>Value</th>
                <th>Price</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reservationTaxes as $reservationTax)
                    <tr>
                <td>{{ $reservationTax->reservation_id }}</td>
                <td>{{ $reservationTax->tax_id }}</td>
                <td>{{ $reservationTax->type }}</td>
                <td>{{ $reservationTax->value }}</td>
                <td>{{ $reservationTax->price }}</td>
                        <td>
                            <a href="{{ route('reservation-taxes.show', $reservationTax->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('reservation-taxes.edit', $reservationTax->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('reservation-taxes.destroy', $reservationTax->id) }}"
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

<div class="mt-3">{{ $reservationTaxes->links() }}</div>
@endsection