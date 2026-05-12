<div class="mb-3">
    <label for="room_type_id" class="form-label fw-semibold">Room Type Id</label>
    <input type="number" name="room_type_id" id="room_type_id"
           value="{{ old('room_type_id', $room->room_type_id ?? '') }}"
           class="form-control @error('room_type_id') is-invalid @enderror" required>
    @error('room_type_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="floor_id" class="form-label fw-semibold">Floor Id</label>
    <input type="number" name="floor_id" id="floor_id"
           value="{{ old('floor_id', $room->floor_id ?? '') }}"
           class="form-control @error('floor_id') is-invalid @enderror" required>
    @error('floor_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="image" class="form-label fw-semibold">Image</label>
    <input type="file" name="image" id="image"
           class="form-control @error('image') is-invalid @enderror">
    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="number" class="form-label fw-semibold">Number</label>
    <input type="number" name="number" id="number"
           value="{{ old('number', $room->number ?? '') }}"
           class="form-control @error('number') is-invalid @enderror" required>
    @error('number')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="status" class="form-label fw-semibold">Status</label>
    <input type="text" name="status" id="status"
           value="{{ old('status', $room->status ?? '') }}"
           class="form-control @error('status') is-invalid @enderror" required>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>