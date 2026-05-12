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
    <label for="amenity_id" class="form-label fw-semibold">Amenity Id</label>
    <input type="number" name="amenity_id" id="amenity_id"
           value="{{ old('amenity_id', $amenity_id ?? '') }}"
           class="form-control @error('amenity_id') is-invalid @enderror" required>
    @error('amenity_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>