<div class="mb-3">
    <label for="name" class="form-label fw-semibold">Name</label>
    <input type="text" name="name" id="name"
           value="{{ old('name', $name ?? '') }}"
           class="form-control @error('name') is-invalid @enderror">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="number" class="form-label fw-semibold">Number</label>
    <input type="number" name="number" id="number"
           value="{{ old('number', $number ?? '') }}"
           class="form-control @error('number') is-invalid @enderror" required>
    @error('number')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>