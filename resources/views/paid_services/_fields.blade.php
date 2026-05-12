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
    <label for="price_type" class="form-label fw-semibold">Price Type</label>
    <input type="text" name="price_type" id="price_type"
           value="{{ old('price_type', $price_type ?? '') }}"
           class="form-control @error('price_type') is-invalid @enderror" required>
    @error('price_type')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="price" class="form-label fw-semibold">Price</label>
    <input type="number" name="price" id="price"
           value="{{ old('price', $price ?? '') }}"
           class="form-control @error('price') is-invalid @enderror" required>
    @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="short_desc" class="form-label fw-semibold">Short Desc</label>
    <textarea name="short_desc" id="short_desc" rows="4"
              class="form-control @error('short_desc') is-invalid @enderror">{{ old('short_desc', $short_desc ?? '') }}</textarea>
    @error('short_desc')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="long_desc" class="form-label fw-semibold">Long Desc</label>
    <textarea name="long_desc" id="long_desc" rows="4"
              class="form-control @error('long_desc') is-invalid @enderror">{{ old('long_desc', $long_desc ?? '') }}</textarea>
    @error('long_desc')
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