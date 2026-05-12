@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">General Settings</h1>
    <a href="{{ route('general-settings.create') }}" class="btn btn-primary">+ Add New</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                <th>Title</th>
                <th>Hotel Name</th>
                <th>Hotel Email</th>
                <th>Hotel Phone</th>
                <th>Hotel Address</th>
                <th>Color</th>
                <th>Cur</th>
                <th>Cur Sym</th>
                <th>Reg</th>
                <th>Ev</th>
                <th>Mv</th>
                <th>En</th>
                <th>Mn</th>
                <th>Sender Email</th>
                <th>Email Message</th>
                <th>Sms Api</th>
                <th>Meta Key Word</th>
                <th>Meta Description</th>
                <th>Meta Author</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($generalSettings as $generalSetting)
                    <tr>
                <td>{{ $generalSetting->title }}</td>
                <td>{{ $generalSetting->hotel_name }}</td>
                <td>{{ $generalSetting->hotel_email }}</td>
                <td>{{ $generalSetting->hotel_phone }}</td>
                <td>{{ $generalSetting->hotel_address }}</td>
                <td>{{ $generalSetting->color }}</td>
                <td>{{ $generalSetting->cur }}</td>
                <td>{{ $generalSetting->cur_sym }}</td>
                <td>{{ $generalSetting->reg }}</td>
                <td>{{ $generalSetting->ev }}</td>
                <td>{{ $generalSetting->mv }}</td>
                <td>{{ $generalSetting->en }}</td>
                <td>{{ $generalSetting->mn }}</td>
                <td>{{ $generalSetting->sender_email }}</td>
                <td>{{ $generalSetting->email_message }}</td>
                <td>{{ $generalSetting->sms_api }}</td>
                <td>{{ $generalSetting->meta_key_word }}</td>
                <td>{{ $generalSetting->meta_description }}</td>
                <td>{{ $generalSetting->meta_author }}</td>
                        <td>
                            <a href="{{ route('general-settings.show', $generalSetting->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('general-settings.edit', $generalSetting->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('general-settings.destroy', $generalSetting->id) }}"
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

<div class="mt-3">{{ $generalSettings->links() }}</div>
@endsection