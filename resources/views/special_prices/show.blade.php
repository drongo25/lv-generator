@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Special Price Details</h4>
                <a href="{{ route('special-prices.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
        <tr>
            <th class="w-25">{{ __('room_type_id') }}</th>
            <td>{{ $specialPrice->room_type_id }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('title') }}</th>
            <td>{{ $specialPrice->title }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('start_time') }}</th>
            <td>{{ $specialPrice->start_time }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('end_time') }}</th>
            <td>{{ $specialPrice->end_time }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_1') }}</th>
            <td>{{ $specialPrice->day_1 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_1_amount') }}</th>
            <td>{{ $specialPrice->day_1_amount }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_2') }}</th>
            <td>{{ $specialPrice->day_2 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_2_amount') }}</th>
            <td>{{ $specialPrice->day_2_amount }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_3') }}</th>
            <td>{{ $specialPrice->day_3 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_3_amount') }}</th>
            <td>{{ $specialPrice->day_3_amount }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_4') }}</th>
            <td>{{ $specialPrice->day_4 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_4_amount') }}</th>
            <td>{{ $specialPrice->day_4_amount }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_5') }}</th>
            <td>{{ $specialPrice->day_5 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_5_amount') }}</th>
            <td>{{ $specialPrice->day_5_amount }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_6') }}</th>
            <td>{{ $specialPrice->day_6 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_6_amount') }}</th>
            <td>{{ $specialPrice->day_6_amount }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_7') }}</th>
            <td>{{ $specialPrice->day_7 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('day_7_amount') }}</th>
            <td>{{ $specialPrice->day_7_amount }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('status') }}</th>
            <td>{{ $specialPrice->status }}</td>
        </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('special-prices.edit', $specialPrice->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('special-prices.destroy', $specialPrice->id) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection