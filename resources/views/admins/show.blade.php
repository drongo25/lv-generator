@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Admin Details</h4>
                <a href="{{ route('admins.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
        <tr>
            <th class="w-25">{{ __('username') }}</th>
            <td>{{ $admin->username }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('email') }}</th>
            <td>{{ $admin->email }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('first_name') }}</th>
            <td>{{ $admin->first_name }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('last_name') }}</th>
            <td>{{ $admin->last_name }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('phone') }}</th>
            <td>{{ $admin->phone }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('address') }}</th>
            <td>{{ $admin->address }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('sex') }}</th>
            <td>{{ $admin->sex }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('picture') }}</th>
            <td>{{ $admin->picture }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('status') }}</th>
            <td>{{ $admin->status }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('password') }}</th>
            <td>{{ $admin->password }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('remember_token') }}</th>
            <td>{{ $admin->remember_token }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('role') }}</th>
            <td>{{ $admin->role }}</td>
        </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('admins.destroy', $admin->id) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection