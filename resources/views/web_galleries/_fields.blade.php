<div class="mb-3">
    <label for="image" class="form-label fw-semibold">Image</label>
    <input type="file" name="image" id="image"
           class="form-control @error('image') is-invalid @enderror">
    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="category_id" class="form-label fw-semibold">Category Id</label>
    <input type="number" name="category_id" id="category_id"
           value="{{ old('category_id', $webGallery->category_id ?? '') }}"
           class="form-control @error('category_id') is-invalid @enderror">
    @error('category_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="type" class="form-label fw-semibold">Type</label>
    <input type="text" name="type" id="type"
           value="{{ old('type', $webGallery->type ?? '') }}"
           class="form-control @error('type') is-invalid @enderror" required>
    @error('type')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="link" class="form-label fw-semibold">Link</label>
    <input type="text" name="link" id="link"
           value="{{ old('link', $webGallery->link ?? '') }}"
           class="form-control @error('link') is-invalid @enderror">
    @error('link')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>