@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Web Galleries</h1>
    <a href="{{ route('web-galleries.create') }}" class="btn btn-primary">+ Add New</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                <th>Image</th>
                <th>Category Id</th>
                <th>Type</th>
                <th>Link</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($webGalleries as $webGallery)
                    <tr>
                <td>{{ $webGallery->image }}</td>
                <td>{{ $webGallery->category_id }}</td>
                <td>{{ $webGallery->type }}</td>
                <td>{{ $webGallery->link }}</td>
                        <td>
                            <a href="{{ route('web-galleries.show', $webGallery->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('web-galleries.edit', $webGallery->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('web-galleries.destroy', $webGallery->id) }}"
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

<div class="mt-3">{{ $webGalleries->links() }}</div>
@endsection