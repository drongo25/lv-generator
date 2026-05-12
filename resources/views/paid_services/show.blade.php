@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Paid Service Details</h4>
                <a href="{{ route('paid-services.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
        <tr>
            <th class="w-25">{{ __('title') }}</th>
            <td>{{ $paidService->title }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('price_type') }}</th>
            <td>{{ $paidService->price_type }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('price') }}</th>
            <td>{{ $paidService->price }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('short_desc') }}</th>
            <td>{{ $paidService->short_desc }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('long_desc') }}</th>
            <td>{{ $paidService->long_desc }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('status') }}</th>
            <td>{{ $paidService->status }}</td>
        </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('paid-services.edit', $paidService->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('paid-services.destroy', $paidService->id) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection