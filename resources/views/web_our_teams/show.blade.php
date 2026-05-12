@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Web Our Team Details</h4>
                <a href="{{ route('web-our-teams.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
        <tr>
            <th class="w-25">{{ __('name') }}</th>
            <td>{{ $webOurTeam->name }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('title') }}</th>
            <td>{{ $webOurTeam->title }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('fb') }}</th>
            <td>{{ $webOurTeam->fb }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('tw') }}</th>
            <td>{{ $webOurTeam->tw }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('lin') }}</th>
            <td>{{ $webOurTeam->lin }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('gp') }}</th>
            <td>{{ $webOurTeam->gp }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('image') }}</th>
            <td>{{ $webOurTeam->image }}</td>
        </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('web-our-teams.edit', $webOurTeam->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('web-our-teams.destroy', $webOurTeam->id) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection