@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Payment Details</h4>
                <a href="{{ route('payments.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
        <tr>
            <th class="w-25">{{ __('user_id') }}</th>
            <td>{{ $payment->user_id }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('gateway_id') }}</th>
            <td>{{ $payment->gateway_id }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('amount') }}</th>
            <td>{{ $payment->amount }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('usd_amo') }}</th>
            <td>{{ $payment->usd_amo }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('trx') }}</th>
            <td>{{ $payment->trx }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('status') }}</th>
            <td>{{ $payment->status }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('try') }}</th>
            <td>{{ $payment->try }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('btc_amo') }}</th>
            <td>{{ $payment->btc_amo }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('btc_wallet') }}</th>
            <td>{{ $payment->btc_wallet }}</td>
        </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('payments.destroy', $payment->id) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection