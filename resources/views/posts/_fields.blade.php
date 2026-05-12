<div class="mb-3">
    <label for="cat_id" class="form-label fw-semibold">Cat Id</label>
    <input type="number" name="cat_id" id="cat_id"
           value="{{ old('cat_id', $cat_id ?? '') }}"
           class="form-control @error('cat_id') is-invalid @enderror" required>
    @error('cat_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="title" class="form-label fw-semibold">Title</label>
    <input type="text" name="title" id="title"
           value="{{ old('title', $title ?? '') }}"
           class="form-control @error('title') is-invalid @enderror" required>
    @error('title')
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

<div class="mb-3">
    <label for="thumb" class="form-label fw-semibold">Thumb</label>
    <input type="text" name="thumb" id="thumb"
           value="{{ old('thumb', $thumb ?? '') }}"
           class="form-control @error('thumb') is-invalid @enderror" required>
    @error('thumb')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="details" class="form-label fw-semibold">Details</label>
    <textarea name="details" id="details" rows="4"
              class="form-control @error('details') is-invalid @enderror" required>{{ old('details', $details ?? '') }}</textarea>
    @error('details')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="status" class="form-label fw-semibold">Status</label>
    <input type="number" name="status" id="status"
           value="{{ old('status', $status ?? '') }}"
           class="form-control @error('status') is-invalid @enderror" required>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="hit" class="form-label fw-semibold">Hit</label>
    <input type="number" name="hit" id="hit"
           value="{{ old('hit', $hit ?? '') }}"
           class="form-control @error('hit') is-invalid @enderror" required>
    @error('hit')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>