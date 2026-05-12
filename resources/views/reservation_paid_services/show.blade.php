@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Reservation Paid Service Details</h4>
                <a href="{{ route('reservation-paid-services.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
        <tr>
            <th class="w-25">{{ __('reservation_id') }}</th>
            <td>{{ $reservationPaidService->reservation_id }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('pad_service_id') }}</th>
            <td>{{ $reservationPaidService->pad_service_id }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('price_type') }}</th>
            <td>{{ $reservationPaidService->price_type }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('value') }}</th>
            <td>{{ $reservationPaidService->value }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('price') }}</th>
            <td>{{ $reservationPaidService->price }}</td>
        </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('reservation-paid-services.edit', $reservationPaidService->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('reservation-paid-services.destroy', $reservationPaidService->id) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection