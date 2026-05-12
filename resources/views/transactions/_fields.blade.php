<div class="mb-3">
    <label for="user_id" class="form-label fw-semibold">User Id</label>
    <input type="number" name="user_id" id="user_id"
           value="{{ old('user_id', $user_id ?? '') }}"
           class="form-control @error('user_id') is-invalid @enderror">
    @error('user_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="gateway_id" class="form-label fw-semibold">Gateway Id</label>
    <input type="number" name="gateway_id" id="gateway_id"
           value="{{ old('gateway_id', $gateway_id ?? '') }}"
           class="form-control @error('gateway_id') is-invalid @enderror">
    @error('gateway_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="amount" class="form-label fw-semibold">Amount</label>
    <input type="number" name="amount" id="amount"
           value="{{ old('amount', $amount ?? '') }}"
           class="form-control @error('amount') is-invalid @enderror">
    @error('amount')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="remarks" class="form-label fw-semibold">Remarks</label>
    <input type="text" name="remarks" id="remarks"
           value="{{ old('remarks', $remarks ?? '') }}"
           class="form-control @error('remarks') is-invalid @enderror">
    @error('remarks')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="trx" class="form-label fw-semibold">Trx</label>
    <input type="text" name="trx" id="trx"
           value="{{ old('trx', $trx ?? '') }}"
           class="form-control @error('trx') is-invalid @enderror">
    @error('trx')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="status" class="form-label fw-semibold">Status</label>
    <input type="text" name="status" id="status"
           value="{{ old('status', $status ?? '') }}"
           class="form-control @error('status') is-invalid @enderror">
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="type" class="form-label fw-semibold">Type</label>
    <input type="text" name="type" id="type"
           value="{{ old('type', $type ?? '') }}"
           class="form-control @error('type') is-invalid @enderror">
    @error('type')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>