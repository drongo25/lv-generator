@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Regular Price Details</h4>
                <a href="{{ route('regular-prices.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
        <tr>
            <th class="w-25">{{ __('room_type_id') }}</th>
            <td>{{ $regularPrice->room_type_id }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_1') }}</th>
            <td>{{ $regularPrice->day_1 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_1_amount') }}</th>
            <td>{{ $regularPrice->day_1_amount }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_2') }}</th>
            <td>{{ $regularPrice->day_2 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_2_amount') }}</th>
            <td>{{ $regularPrice->day_2_amount }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_3') }}</th>
            <td>{{ $regularPrice->day_3 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_3_amount') }}</th>
            <td>{{ $regularPrice->day_3_amount }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_4') }}</th>
            <td>{{ $regularPrice->day_4 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_4_amount') }}</th>
            <td>{{ $regularPrice->day_4_amount }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_5') }}</th>
            <td>{{ $regularPrice->day_5 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_5_amount') }}</th>
            <td>{{ $regularPrice->day_5_amount }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_6') }}</th>
            <td>{{ $regularPrice->day_6 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_6_amount') }}</th>
            <td>{{ $regularPrice->day_6_amount }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_7') }}</th>
            <td>{{ $regularPrice->day_7 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_7_amount') }}</th>
            <td>{{ $regularPrice->day_7_amount }}</td>
        </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('regular-prices.edit', $regularPrice->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('regular-prices.destroy', $regularPrice->id) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection