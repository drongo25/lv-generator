@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Gateways</h1>
    <a href="{{ route('gateways.create') }}" class="btn btn-primary">+ Add New</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                <th>Main Name</th>
                <th>Name</th>
                <th>Minamo</th>
                <th>Maxamo</th>
                <th>Fixed Charge</th>
                <th>Percent Charge</th>
                <th>Rate</th>
                <th>Val1</th>
                <th>Val2</th>
                <th>Val3</th>
                <th>Val4</th>
                <th>Val5</th>
                <th>Val6</th>
                <th>Val7</th>
                <th>Status</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($gateways as $gateway)
                    <tr>
                <td>{{ $gateway->main_name }}</td>
                <td>{{ $gateway->name }}</td>
                <td>{{ $gateway->minamo }}</td>
                <td>{{ $gateway->maxamo }}</td>
                <td>{{ $gateway->fixed_charge }}</td>
                <td>{{ $gateway->percent_charge }}</td>
                <td>{{ $gateway->rate }}</td>
                <td>{{ $gateway->val1 }}</td>
                <td>{{ $gateway->val2 }}</td>
                <td>{{ $gateway->val3 }}</td>
                <td>{{ $gateway->val4 }}</td>
                <td>{{ $gateway->val5 }}</td>
                <td>{{ $gateway->val6 }}</td>
                <td>{{ $gateway->val7 }}</td>
                <td>{{ $gateway->status }}</td>
                        <td>
                            <a href="{{ route('gateways.show', $gateway->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('gateways.edit', $gateway->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('gateways.destroy', $gateway->id) }}"
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

<div class="mt-3">{{ $gateways->links() }}</div>
@endsection