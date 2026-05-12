@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">+ Add New</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                <th>Cat Id</th>
                <th>Title</th>
                <th>Image</th>
                <th>Thumb</th>
                <th>Details</th>
                <th>Status</th>
                <th>Hit</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                    <tr>
                <td>{{ $post->cat_id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->image }}</td>
                <td>{{ $post->thumb }}</td>
                <td>{{ $post->details }}</td>
                <td>{{ $post->status }}</td>
                <td>{{ $post->hit }}</td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('posts.edit', $post->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="99" class="text-center text-muted py-4">No records found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-3">{{ $posts->links() }}</div>
@endsection