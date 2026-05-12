@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Tax Manager Details</h4>
                <a href="{{ route('tax-managers.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
        <tr>
            <th class="w-25">{{ __('name') }}</th>
            <td>{{ $taxManager->name }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('code') }}</th>
            <td>{{ $taxManager->code }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('type') }}</th>
            <td>{{ $taxManager->type }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('rate') }}</th>
            <td>{{ $taxManager->rate }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('status') }}</th>
            <td>{{ $taxManager->status }}</td>
        </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('tax-managers.edit', $taxManager->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('tax-managers.destroy', $taxManager->id) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection