@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Room Type Details</h4>
                <a href="{{ route('room-types.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
        <tr>
            <th class="w-25">{{ __('title') }}</th>
            <td>{{ $roomType->title }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('slug') }}</th>
            <td>{{ $roomType->slug }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('short_code') }}</th>
            <td>{{ $roomType->short_code }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('description') }}</th>
            <td>{{ $roomType->description }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('base_capacity') }}</th>
            <td>{{ $roomType->base_capacity }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('higher_capacity') }}</th>
            <td>{{ $roomType->higher_capacity }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('extra_bed') }}</th>
            <td>{{ $roomType->extra_bed }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('kids_capacity') }}</th>
            <td>{{ $roomType->kids_capacity }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('base_price') }}</th>
            <td>{{ $roomType->base_price }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('additional_person_price') }}</th>
            <td>{{ $roomType->additional_person_price }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('extra_bed_price') }}</th>
            <td>{{ $roomType->extra_bed_price }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('status') }}</th>
            <td>{{ $roomType->status }}</td>
        </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('room-types.edit', $roomType->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('room-types.destroy', $roomType->id) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection