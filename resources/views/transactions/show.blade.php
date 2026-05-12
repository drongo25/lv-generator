@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Transaction Details</h4>
                <a href="{{ route('transactions.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
        <tr>
            <th class="w-25">{{ __('user_id') }}</th>
            <td>{{ $transaction->user_id }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('gateway_id') }}</th>
            <td>{{ $transaction->gateway_id }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('amount') }}</th>
            <td>{{ $transaction->amount }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('remarks') }}</th>
            <td>{{ $transaction->remarks }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('trx') }}</th>
            <td>{{ $transaction->trx }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('status') }}</th>
            <td>{{ $transaction->status }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('type') }}</th>
            <td>{{ $transaction->type }}</td>
        </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection