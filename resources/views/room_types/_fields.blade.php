<div class="mb-3">
    <label for="title" class="form-label fw-semibold">Title</label>
    <input type="text" name="title" id="title"
           value="{{ old('title', $roomType->title ?? '') }}"
           class="form-control @error('title') is-invalid @enderror" required>
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="slug" class="form-label fw-semibold">Slug</label>
    <input type="text" name="slug" id="slug"
           value="{{ old('slug', $roomType->slug ?? '') }}"
           class="form-control @error('slug') is-invalid @enderror" required>
    @error('slug')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="short_code" class="form-label fw-semibold">Short Code</label>
    <input type="text" name="short_code" id="short_code"
           value="{{ old('short_code', $roomType->short_code ?? '') }}"
           class="form-control @error('short_code') is-invalid @enderror" required>
    @error('short_code')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label fw-semibold">Description</label>
    <textarea name="description" id="description" rows="4"
              class="form-control @error('description') is-invalid @enderror">{{ old('description', $roomType->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="base_capacity" class="form-label fw-semibold">Base Capacity</label>
    <input type="number" name="base_capacity" id="base_capacity"
           value="{{ old('base_capacity', $roomType->base_capacity ?? '') }}"
           class="form-control @error('base_capacity') is-invalid @enderror" required>
    @error('base_capacity')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="higher_capacity" class="form-label fw-semibold">Higher Capacity</label>
    <input type="number" name="higher_capacity" id="higher_capacity"
           value="{{ old('higher_capacity', $roomType->higher_capacity ?? '') }}"
           class="form-control @error('higher_capacity') is-invalid @enderror" required>
    @error('higher_capacity')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="extra_bed" class="form-label fw-semibold">Extra Bed</label>
    <input type="text" name="extra_bed" id="extra_bed"
           value="{{ old('extra_bed', $roomType->extra_bed ?? '') }}"
           class="form-control @error('extra_bed') is-invalid @enderror" required>
    @error('extra_bed')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="kids_capacity" class="form-label fw-semibold">Kids Capacity</label>
    <input type="number" name="kids_capacity" id="kids_capacity"
           value="{{ old('kids_capacity', $roomType->kids_capacity ?? '') }}"
           class="form-control @error('kids_capacity') is-invalid @enderror" required>
    @error('kids_capacity')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="base_price" class="form-label fw-semibold">Base Price</label>
    <input type="number" name="base_price" id="base_price"
           value="{{ old('base_price', $roomType->base_price ?? '') }}"
           class="form-control @error('base_price') is-invalid @enderror" required>
    @error('base_price')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="additional_person_price" class="form-label fw-semibold">Additional Person Price</label>
    <input type="number" name="additional_person_price" id="additional_person_price"
           value="{{ old('additional_person_price', $roomType->additional_person_price ?? '') }}"
           class="form-control @error('additional_person_price') is-invalid @enderror" required>
    @error('additional_person_price')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="extra_bed_price" class="form-label fw-semibold">Extra Bed Price</label>
    <input type="number" name="extra_bed_price" id="extra_bed_price"
           value="{{ old('extra_bed_price', $roomType->extra_bed_price ?? '') }}"
           class="form-control @error('extra_bed_price') is-invalid @enderror" required>
    @error('extra_bed_price')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="status" class="form-label fw-semibold">Status</label>
    <input type="text" name="status" id="status"
           value="{{ old('status', $roomType->status ?? '') }}"
           class="form-control @error('status') is-invalid @enderror" required>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>