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
    <label for="icon" class="form-label fw-semibold">Icon</label>
    <input type="text" name="icon" id="icon"
           value="{{ old('icon', $icon ?? '') }}"
           class="form-control @error('icon') is-invalid @enderror">
    @error('icon')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="link" class="form-label fw-semibold">Link</label>
    <input type="text" name="link" id="link"
           value="{{ old('link', $link ?? '') }}"
           class="form-control @error('link') is-invalid @enderror">
    @error('link')
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