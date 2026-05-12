@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Paid Services</h1>
    <a href="{{ route('paid-services.create') }}" class="btn btn-primary">+ Add New</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                <th>Title</th>
                <th>Price Type</th>
                <th>Price</th>
                <th>Short Desc</th>
                <th>Long Desc</th>
                <th>Status</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($paidServices as $paidService)
                    <tr>
                <td>{{ $paidService->title }}</td>
                <td>{{ $paidService->price_type }}</td>
                <td>{{ $paidService->price }}</td>
                <td>{{ $paidService->short_desc }}</td>
                <td>{{ $paidService->long_desc }}</td>
                <td>{{ $paidService->status }}</td>
                        <td>
                            <a href="{{ route('paid-services.show', $paidService->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('paid-services.edit', $paidService->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('paid-services.destroy', $paidService->id) }}"
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

<div class="mt-3">{{ $paidServices->links() }}</div>
@endsection