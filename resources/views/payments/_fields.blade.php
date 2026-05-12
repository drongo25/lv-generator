<div class="mb-3">
    <label for="user_id" class="form-label fw-semibold">User Id</label>
    <input type="number" name="user_id" id="user_id"
           value="{{ old('user_id', $payment->user_id ?? '') }}"
           class="form-control @error('user_id') is-invalid @enderror" required>
    @error('user_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="gateway_id" class="form-label fw-semibold">Gateway Id</label>
    <input type="number" name="gateway_id" id="gateway_id"
           value="{{ old('gateway_id', $payment->gateway_id ?? '') }}"
           class="form-control @error('gateway_id') is-invalid @enderror" required>
    @error('gateway_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="amount" class="form-label fw-semibold">Amount</label>
    <input type="number" name="amount" id="amount"
           value="{{ old('amount', $payment->amount ?? '') }}"
           class="form-control @error('amount') is-invalid @enderror" required>
    @error('amount')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="usd_amo" class="form-label fw-semibold">Usd Amo</label>
    <input type="number" name="usd_amo" id="usd_amo"
           value="{{ old('usd_amo', $payment->usd_amo ?? '') }}"
           class="form-control @error('usd_amo') is-invalid @enderror" required>
    @error('usd_amo')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="trx" class="form-label fw-semibold">Trx</label>
    <input type="text" name="trx" id="trx"
           value="{{ old('trx', $payment->trx ?? '') }}"
           class="form-control @error('trx') is-invalid @enderror" required>
    @error('trx')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="status" class="form-label fw-semibold">Status</label>
    <input type="text" name="status" id="status"
           value="{{ old('status', $payment->status ?? '') }}"
           class="form-control @error('status') is-invalid @enderror" required>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="try" class="form-label fw-semibold">Try</label>
    <input type="text" name="try" id="try"
           value="{{ old('try', $payment->try ?? '') }}"
           class="form-control @error('try') is-invalid @enderror" required>
    @error('try')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="btc_amo" class="form-label fw-semibold">Btc Amo</label>
    <input type="number" name="btc_amo" id="btc_amo"
           value="{{ old('btc_amo', $payment->btc_amo ?? '') }}"
           class="form-control @error('btc_amo') is-invalid @enderror" required>
    @error('btc_amo')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="btc_wallet" class="form-label fw-semibold">Btc Wallet</label>
    <input type="number" name="btc_wallet" id="btc_wallet"
           value="{{ old('btc_wallet', $payment->btc_wallet ?? '') }}"
           class="form-control @error('btc_wallet') is-invalid @enderror" required>
    @error('btc_wallet')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>