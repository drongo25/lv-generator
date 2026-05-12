@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Payments</h1>
    <a href="{{ route('payments.create') }}" class="btn btn-primary">+ Add New</a>
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
                <th>Usd Amo</th>
                <th>Trx</th>
                <th>Status</th>
                <th>Try</th>
                <th>Btc Amo</th>
                <th>Btc Wallet</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($payments as $payment)
                    <tr>
                <td>{{ $payment->user_id }}</td>
                <td>{{ $payment->gateway_id }}</td>
                <td>{{ $payment->amount }}</td>
                <td>{{ $payment->usd_amo }}</td>
                <td>{{ $payment->trx }}</td>
                <td>{{ $payment->status }}</td>
                <td>{{ $payment->try }}</td>
                <td>{{ $payment->btc_amo }}</td>
                <td>{{ $payment->btc_wallet }}</td>
                        <td>
                            <a href="{{ route('payments.show', $payment->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('payments.edit', $payment->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('payments.destroy', $payment->id) }}"
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

<div class="mt-3">{{ $payments->links() }}</div>
@endsection