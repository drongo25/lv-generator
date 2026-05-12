<div class="mb-3">
    <label for="name" class="form-label fw-semibold">Name</label>
    <input type="text" name="name" id="name"
           value="{{ old('name', $name ?? '') }}"
           class="form-control @error('name') is-invalid @enderror" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="code" class="form-label fw-semibold">Code</label>
    <input type="text" name="code" id="code"
           value="{{ old('code', $code ?? '') }}"
           class="form-control @error('code') is-invalid @enderror" required>
    @error('code')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="type" class="form-label fw-semibold">Type</label>
    <input type="text" name="type" id="type"
           value="{{ old('type', $type ?? '') }}"
           class="form-control @error('type') is-invalid @enderror" required>
    @error('type')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="rate" class="form-label fw-semibold">Rate</label>
    <input type="number" name="rate" id="rate"
           value="{{ old('rate', $rate ?? '') }}"
           class="form-control @error('rate') is-invalid @enderror" required>
    @error('rate')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="status" class="form-label fw-semibold">Status</label>
    <input type="text" name="status" id="status"
           value="{{ old('status', $status ?? '') }}"
           class="form-control @error('status') is-invalid @enderror" required>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>