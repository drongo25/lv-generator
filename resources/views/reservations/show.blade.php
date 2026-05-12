@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Reservation Details</h4>
                <a href="{{ route('reservations.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
        <tr>
            <th class="w-25">{{ __('uid') }}</th>
            <td>{{ $reservation->uid }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('date') }}</th>
            <td>{{ $reservation->date }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('user_id') }}</th>
            <td>{{ $reservation->user_id }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('room_type_id') }}</th>
            <td>{{ $reservation->room_type_id }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('adults') }}</th>
            <td>{{ $reservation->adults }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('kids') }}</th>
            <td>{{ $reservation->kids }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('check_in') }}</th>
            <td>{{ $reservation->check_in }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('check_out') }}</th>
            <td>{{ $reservation->check_out }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('number_of_room') }}</th>
            <td>{{ $reservation->number_of_room }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('status') }}</th>
            <td>{{ $reservation->status }}</td>
        </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection