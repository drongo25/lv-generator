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
    <label for="image" class="form-label fw-semibold">Image</label>
    <input type="text" name="image" id="image"
           value="{{ old('image', $image ?? '') }}"
           class="form-control @error('image') is-invalid @enderror" required>
    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>