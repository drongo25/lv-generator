@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Web Facility Details</h4>
                <a href="{{ route('web-facilities.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
        <tr>
            <th class="w-25">{{ __('name') }}</th>
            <td>{{ $webFacility->name }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('image') }}</th>
            <td>{{ $webFacility->image }}</td>
        </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('web-facilities.edit', $webFacility->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('web-facilities.destroy', $webFacility->id) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection