@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Gateway Details</h4>
                <a href="{{ route('gateways.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
        <tr>
            <th class="w-25">{{ __('main_name') }}</th>
            <td>{{ $gateway->main_name }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('name') }}</th>
            <td>{{ $gateway->name }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('minamo') }}</th>
            <td>{{ $gateway->minamo }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('maxamo') }}</th>
            <td>{{ $gateway->maxamo }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('fixed_charge') }}</th>
            <td>{{ $gateway->fixed_charge }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('percent_charge') }}</th>
            <td>{{ $gateway->percent_charge }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('rate') }}</th>
            <td>{{ $gateway->rate }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('val1') }}</th>
            <td>{{ $gateway->val1 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('val2') }}</th>
            <td>{{ $gateway->val2 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('val3') }}</th>
            <td>{{ $gateway->val3 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('val4') }}</th>
            <td>{{ $gateway->val4 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('val5') }}</th>
            <td>{{ $gateway->val5 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('val6') }}</th>
            <td>{{ $gateway->val6 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('val7') }}</th>
            <td>{{ $gateway->val7 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('status') }}</th>
            <td>{{ $gateway->status }}</td>
        </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('gateways.edit', $gateway->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('gateways.destroy', $gateway->id) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection