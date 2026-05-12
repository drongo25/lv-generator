@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Admins</h1>
    <a href="{{ route('admins.create') }}" class="btn btn-primary">+ Add New</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                <th>Username</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Sex</th>
                <th>Picture</th>
                <th>Status</th>
                <th>Password</th>
                <th>Remember Token</th>
                <th>Role</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($admins as $admin)
                    <tr>
                <td>{{ $admin->username }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->first_name }}</td>
                <td>{{ $admin->last_name }}</td>
                <td>{{ $admin->phone }}</td>
                <td>{{ $admin->address }}</td>
                <td>{{ $admin->sex }}</td>
                <td>{{ $admin->picture }}</td>
                <td>{{ $admin->status }}</td>
                <td>{{ $admin->password }}</td>
                <td>{{ $admin->remember_token }}</td>
                <td>{{ $admin->role }}</td>
                        <td>
                            <a href="{{ route('admins.show', $admin->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('admins.edit', $admin->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('admins.destroy', $admin->id) }}"
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

<div class="mt-3">{{ $admins->links() }}</div>
@endsection