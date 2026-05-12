@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Room Type Image Details</h4>
                <a href="{{ route('room-type-images.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
        <tr>
            <th class="w-25">{{ __('image') }}</th>
            <td>{{ $roomTypeImage->image }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('room_type_id') }}</th>
            <td>{{ $roomTypeImage->room_type_id }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('featured') }}</th>
            <td>{{ $roomTypeImage->featured }}</td>
        </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('room-type-images.edit', $roomTypeImage->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('room-type-images.destroy', $roomTypeImage->id) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection