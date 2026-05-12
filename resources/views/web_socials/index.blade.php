@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Web Socials</h1>
    <a href="{{ route('web-socials.create') }}" class="btn btn-primary">+ Add New</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                <th>Name</th>
                <th>Icon</th>
                <th>Link</th>
                <th>Status</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($webSocials as $webSocial)
                    <tr>
                <td>{{ $webSocial->name }}</td>
                <td>{{ $webSocial->icon }}</td>
                <td>{{ $webSocial->link }}</td>
                <td>{{ $webSocial->status }}</td>
                        <td>
                            <a href="{{ route('web-socials.show', $webSocial->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('web-socials.edit', $webSocial->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('web-socials.destroy', $webSocial->id) }}"
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

<div class="mt-3">{{ $webSocials->links() }}</div>
@endsection