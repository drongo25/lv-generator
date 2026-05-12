<div class="mb-3">
    <label for="coupon_id" class="form-label fw-semibold">Coupon Id</label>
    <input type="number" name="coupon_id" id="coupon_id"
           value="{{ old('coupon_id', $coupon_id ?? '') }}"
           class="form-control @error('coupon_id') is-invalid @enderror" required>
    @error('coupon_id')
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