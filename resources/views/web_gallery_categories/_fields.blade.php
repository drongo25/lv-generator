<div class="mb-3">
    <label for="name" class="form-label fw-semibold">Name</label>
    <input type="text" name="name" id="name"
           value="{{ old('name', $name ?? '') }}"
           class="form-control @error('name') is-invalid @enderror" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>