@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Reservation Night Details</h4>
                <a href="{{ route('reservation-nights.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
        <tr>
            <th class="w-25">{{ __('reservation_id') }}</th>
            <td>{{ $reservationNight->reservation_id }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('room_id') }}</th>
            <td>{{ $reservationNight->room_id }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('date') }}</th>
            <td>{{ $reservationNight->date }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('check_in') }}</th>
            <td>{{ $reservationNight->check_in }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('check_out') }}</th>
            <td>{{ $reservationNight->check_out }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('price') }}</th>
            <td>{{ $reservationNight->price }}</td>
        </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('reservation-nights.edit', $reservationNight->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('reservation-nights.destroy', $reservationNight->id) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection