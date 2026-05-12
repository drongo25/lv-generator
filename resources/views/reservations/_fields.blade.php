<div class="mb-3">
    <label for="uid" class="form-label fw-semibold">Uid</label>
    <input type="number" name="uid" id="uid"
           value="{{ old('uid', $reservation->uid ?? '') }}"
           class="form-control @error('uid') is-invalid @enderror" required>
    @error('uid')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="date" class="form-label fw-semibold">Date</label>
    <input type="datetime-local" name="date" id="date"
           value="{{ old('date', $reservation->date ?? '') }}"
           class="form-control @error('date') is-invalid @enderror" required>
    @error('date')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="user_id" class="form-label fw-semibold">User Id</label>
    <input type="number" name="user_id" id="user_id"
           value="{{ old('user_id', $reservation->user_id ?? '') }}"
           class="form-control @error('user_id') is-invalid @enderror" required>
    @error('user_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="room_type_id" class="form-label fw-semibold">Room Type Id</label>
    <input type="number" name="room_type_id" id="room_type_id"
           value="{{ old('room_type_id', $reservation->room_type_id ?? '') }}"
           class="form-control @error('room_type_id') is-invalid @enderror" required>
    @error('room_type_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="adults" class="form-label fw-semibold">Adults</label>
    <input type="number" name="adults" id="adults"
           value="{{ old('adults', $reservation->adults ?? '') }}"
           class="form-control @error('adults') is-invalid @enderror" required>
    @error('adults')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="kids" class="form-label fw-semibold">Kids</label>
    <input type="number" name="kids" id="kids"
           value="{{ old('kids', $reservation->kids ?? '') }}"
           class="form-control @error('kids') is-invalid @enderror" required>
    @error('kids')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="check_in" class="form-label fw-semibold">Check In</label>
    <input type="date" name="check_in" id="check_in"
           value="{{ old('check_in', $reservation->check_in ?? '') }}"
           class="form-control @error('check_in') is-invalid @enderror" required>
    @error('check_in')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="check_out" class="form-label fw-semibold">Check Out</label>
    <input type="date" name="check_out" id="check_out"
           value="{{ old('check_out', $reservation->check_out ?? '') }}"
           class="form-control @error('check_out') is-invalid @enderror" required>
    @error('check_out')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="number_of_room" class="form-label fw-semibold">Number Of Room</label>
    <input type="number" name="number_of_room" id="number_of_room"
           value="{{ old('number_of_room', $reservation->number_of_room ?? '') }}"
           class="form-control @error('number_of_room') is-invalid @enderror" required>
    @error('number_of_room')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="status" class="form-label fw-semibold">Status</label>
    <input type="text" name="status" id="status"
           value="{{ old('status', $reservation->status ?? '') }}"
           class="form-control @error('status') is-invalid @enderror" required>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>