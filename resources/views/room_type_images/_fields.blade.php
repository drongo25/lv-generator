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
    <label for="room_type_id" class="form-label fw-semibold">Room Type Id</label>
    <input type="number" name="room_type_id" id="room_type_id"
           value="{{ old('room_type_id', $room_type_id ?? '') }}"
           class="form-control @error('room_type_id') is-invalid @enderror" required>
    @error('room_type_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="featured" class="form-label fw-semibold">Featured</label>
    <input type="text" name="featured" id="featured"
           value="{{ old('featured', $featured ?? '') }}"
           class="form-control @error('featured') is-invalid @enderror" required>
    @error('featured')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>