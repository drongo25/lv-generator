@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Transactions</h1>
    <a href="{{ route('transactions.create') }}" class="btn btn-primary">+ Add New</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                <th>User Id</th>
                <th>Gateway Id</th>
                <th>Amount</th>
                <th>Remarks</th>
                <th>Trx</th>
                <th>Status</th>
                <th>Type</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transactions as $transaction)
                    <tr>
                <td>{{ $transaction->user_id }}</td>
                <td>{{ $transaction->gateway_id }}</td>
                <td>{{ $transaction->amount }}</td>
                <td>{{ $transaction->remarks }}</td>
                <td>{{ $transaction->trx }}</td>
                <td>{{ $transaction->status }}</td>
                <td>{{ $transaction->type }}</td>
                        <td>
                            <a href="{{ route('transactions.show', $transaction->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('transactions.edit', $transaction->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('transactions.destroy', $transaction->id) }}"
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

<div class="mt-3">{{ $transactions->links() }}</div>
@endsection