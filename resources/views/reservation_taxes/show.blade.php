@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Reservation Tax Details</h4>
                <a href="{{ route('reservation-taxes.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
        <tr>
            <th class="w-25">{{ __('reservation_id') }}</th>
            <td>{{ $reservationTax->reservation_id }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('tax_id') }}</th>
            <td>{{ $reservationTax->tax_id }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('type') }}</th>
            <td>{{ $reservationTax->type }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('value') }}</th>
            <td>{{ $reservationTax->value }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('price') }}</th>
            <td>{{ $reservationTax->price }}</td>
        </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('reservation-taxes.edit', $reservationTax->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('reservation-taxes.destroy', $reservationTax->id) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection