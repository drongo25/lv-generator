@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Post Details</h4>
                <a href="{{ route('posts.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
        <tr>
            <th class="w-25">{{ __('cat_id') }}</th>
            <td>{{ $post->cat_id }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('title') }}</th>
            <td>{{ $post->title }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('image') }}</th>
            <td>{{ $post->image }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('thumb') }}</th>
            <td>{{ $post->thumb }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('details') }}</th>
            <td>{{ $post->details }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('status') }}</th>
            <td>{{ $post->status }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('hit') }}</th>
            <td>{{ $post->hit }}</td>
        </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection