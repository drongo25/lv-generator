@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Web Our Teams</h1>
    <a href="{{ route('web-our-teams.create') }}" class="btn btn-primary">+ Add New</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                <th>Name</th>
                <th>Title</th>
                <th>Fb</th>
                <th>Tw</th>
                <th>Lin</th>
                <th>Gp</th>
                <th>Image</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($webOurTeams as $webOurTeam)
                    <tr>
                <td>{{ $webOurTeam->name }}</td>
                <td>{{ $webOurTeam->title }}</td>
                <td>{{ $webOurTeam->fb }}</td>
                <td>{{ $webOurTeam->tw }}</td>
                <td>{{ $webOurTeam->lin }}</td>
                <td>{{ $webOurTeam->gp }}</td>
                <td>{{ $webOurTeam->image }}</td>
                        <td>
                            <a href="{{ route('web-our-teams.show', $webOurTeam->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('web-our-teams.edit', $webOurTeam->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('web-our-teams.destroy', $webOurTeam->id) }}"
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

<div class="mt-3">{{ $webOurTeams->links() }}</div>
@endsection