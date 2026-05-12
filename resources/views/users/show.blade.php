@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">User Details</h4>
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
        <tr>
            <th class="w-25">{{ __('username') }}</th>
            <td>{{ $user->username }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('email') }}</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('first_name') }}</th>
            <td>{{ $user->first_name }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('last_name') }}</th>
            <td>{{ $user->last_name }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('phone') }}</th>
            <td>{{ $user->phone }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('dob') }}</th>
            <td>{{ $user->dob }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('address') }}</th>
            <td>{{ $user->address }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('sex') }}</th>
            <td>{{ $user->sex }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('picture') }}</th>
            <td>{{ $user->picture }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('id_type') }}</th>
            <td>{{ $user->id_type }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('id_number') }}</th>
            <td>{{ $user->id_number }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('id_card_image') }}</th>
            <td>{{ $user->id_card_image }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('remarks') }}</th>
            <td>{{ $user->remarks }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('vip') }}</th>
            <td>{{ $user->vip }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('email_verified') }}</th>
            <td>{{ $user->email_verified }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('email_verified_code') }}</th>
            <td>{{ $user->email_verified_code }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('sms_verified') }}</th>
            <td>{{ $user->sms_verified }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('sms_verified_code') }}</th>
            <td>{{ $user->sms_verified_code }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('status') }}</th>
            <td>{{ $user->status }}</td>
        </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection