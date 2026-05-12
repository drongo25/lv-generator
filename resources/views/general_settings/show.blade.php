@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">General Setting Details</h4>
                <a href="{{ route('general-settings.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
        <tr>
            <th class="w-25">{{ __('title') }}</th>
            <td>{{ $generalSetting->title }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('hotel_name') }}</th>
            <td>{{ $generalSetting->hotel_name }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('hotel_email') }}</th>
            <td>{{ $generalSetting->hotel_email }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('hotel_phone') }}</th>
            <td>{{ $generalSetting->hotel_phone }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('hotel_address') }}</th>
            <td>{{ $generalSetting->hotel_address }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('color') }}</th>
            <td>{{ $generalSetting->color }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('cur') }}</th>
            <td>{{ $generalSetting->cur }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('cur_sym') }}</th>
            <td>{{ $generalSetting->cur_sym }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('reg') }}</th>
            <td>{{ $generalSetting->reg }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('ev') }}</th>
            <td>{{ $generalSetting->ev }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('mv') }}</th>
            <td>{{ $generalSetting->mv }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('en') }}</th>
            <td>{{ $generalSetting->en }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('mn') }}</th>
            <td>{{ $generalSetting->mn }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('sender_email') }}</th>
            <td>{{ $generalSetting->sender_email }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('email_message') }}</th>
            <td>{{ $generalSetting->email_message }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('sms_api') }}</th>
            <td>{{ $generalSetting->sms_api }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('meta_key_word') }}</th>
            <td>{{ $generalSetting->meta_key_word }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('meta_description') }}</th>
            <td>{{ $generalSetting->meta_description }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('meta_author') }}</th>
            <td>{{ $generalSetting->meta_author }}</td>
        </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('general-settings.edit', $generalSetting->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('general-settings.destroy', $generalSetting->id) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection