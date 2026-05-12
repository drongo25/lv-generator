<div class="mb-3">
    <label for="reservation_id" class="form-label fw-semibold">Reservation Id</label>
    <input type="number" name="reservation_id" id="reservation_id"
           value="{{ old('reservation_id', $reservationNight->reservation_id ?? '') }}"
           class="form-control @error('reservation_id') is-invalid @enderror" required>
    @error('reservation_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="room_id" class="form-label fw-semibold">Room Id</label>
    <input type="number" name="room_id" id="room_id"
           value="{{ old('room_id', $reservationNight->room_id ?? '') }}"
           class="form-control @error('room_id') is-invalid @enderror" required>
    @error('room_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="date" class="form-label fw-semibold">Date</label>
    <input type="date" name="date" id="date"
           value="{{ old('date', $reservationNight->date ?? '') }}"
           class="form-control @error('date') is-invalid @enderror" required>
    @error('date')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="check_in" class="form-label fw-semibold">Check In</label>
    <input type="datetime-local" name="check_in" id="check_in"
           value="{{ old('check_in', $reservationNight->check_in ?? '') }}"
           class="form-control @error('check_in') is-invalid @enderror" required>
    @error('check_in')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="check_out" class="form-label fw-semibold">Check Out</label>
    <input type="datetime-local" name="check_out" id="check_out"
           value="{{ old('check_out', $reservationNight->check_out ?? '') }}"
           class="form-control @error('check_out') is-invalid @enderror" required>
    @error('check_out')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="price" class="form-label fw-semibold">Price</label>
    <input type="number" name="price" id="price"
           value="{{ old('price', $reservationNight->price ?? '') }}"
           class="form-control @error('price') is-invalid @enderror" required>
    @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>