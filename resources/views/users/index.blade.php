@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Users</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary">+ Add New</a>
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
                <th>Dob</th>
                <th>Address</th>
                <th>Sex</th>
                <th>Picture</th>
                <th>Password</th>
                <th>Id Type</th>
                <th>Id Number</th>
                <th>Id Card Image</th>
                <th>Remarks</th>
                <th>Vip</th>
                <th>Email Verified</th>
                <th>Email Verified Code</th>
                <th>Sms Verified</th>
                <th>Sms Verified Code</th>
                <th>Status</th>
                <th>Remember Token</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->dob }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->sex }}</td>
                <td>{{ $user->picture }}</td>
                <td>{{ $user->password }}</td>
                <td>{{ $user->id_type }}</td>
                <td>{{ $user->id_number }}</td>
                <td>{{ $user->id_card_image }}</td>
                <td>{{ $user->remarks }}</td>
                <td>{{ $user->vip }}</td>
                <td>{{ $user->email_verified }}</td>
                <td>{{ $user->email_verified_code }}</td>
                <td>{{ $user->sms_verified }}</td>
                <td>{{ $user->sms_verified_code }}</td>
                <td>{{ $user->status }}</td>
                <td>{{ $user->remember_token }}</td>
                        <td>
                            <a href="{{ route('users.show', $user->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('users.edit', $user->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}"
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

<div class="mt-3">{{ $users->links() }}</div>
@endsection