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
    <label for="title" class="form-label fw-semibold">Title</label>
    <input type="text" name="title" id="title"
           value="{{ old('title', $title ?? '') }}"
           class="form-control @error('title') is-invalid @enderror" required>
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="start_time" class="form-label fw-semibold">Start Time</label>
    <input type="datetime-local" name="start_time" id="start_time"
           value="{{ old('start_time', $start_time ?? '') }}"
           class="form-control @error('start_time') is-invalid @enderror" required>
    @error('start_time')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="end_time" class="form-label fw-semibold">End Time</label>
    <input type="datetime-local" name="end_time" id="end_time"
           value="{{ old('end_time', $end_time ?? '') }}"
           class="form-control @error('end_time') is-invalid @enderror" required>
    @error('end_time')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="day_1" class="form-label fw-semibold">Day 1</label>
    <input type="text" name="day_1" id="day_1"
           value="{{ old('day_1', $day_1 ?? '') }}"
           class="form-control @error('day_1') is-invalid @enderror" required>
    @error('day_1')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="day_1_amount" class="form-label fw-semibold">Day 1 Amount</label>
    <input type="number" name="day_1_amount" id="day_1_amount"
           value="{{ old('day_1_amount', $day_1_amount ?? '') }}"
           class="form-control @error('day_1_amount') is-invalid @enderror" required>
    @error('day_1_amount')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="day_2" class="form-label fw-semibold">Day 2</label>
    <input type="text" name="day_2" id="day_2"
           value="{{ old('day_2', $day_2 ?? '') }}"
           class="form-control @error('day_2') is-invalid @enderror" required>
    @error('day_2')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="day_2_amount" class="form-label fw-semibold">Day 2 Amount</label>
    <input type="number" name="day_2_amount" id="day_2_amount"
           value="{{ old('day_2_amount', $day_2_amount ?? '') }}"
           class="form-control @error('day_2_amount') is-invalid @enderror" required>
    @error('day_2_amount')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="day_3" class="form-label fw-semibold">Day 3</label>
    <input type="text" name="day_3" id="day_3"
           value="{{ old('day_3', $day_3 ?? '') }}"
           class="form-control @error('day_3') is-invalid @enderror" required>
    @error('day_3')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="day_3_amount" class="form-label fw-semibold">Day 3 Amount</label>
    <input type="number" name="day_3_amount" id="day_3_amount"
           value="{{ old('day_3_amount', $day_3_amount ?? '') }}"
           class="form-control @error('day_3_amount') is-invalid @enderror" required>
    @error('day_3_amount')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="day_4" class="form-label fw-semibold">Day 4</label>
    <input type="text" name="day_4" id="day_4"
           value="{{ old('day_4', $day_4 ?? '') }}"
           class="form-control @error('day_4') is-invalid @enderror" required>
    @error('day_4')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="day_4_amount" class="form-label fw-semibold">Day 4 Amount</label>
    <input type="number" name="day_4_amount" id="day_4_amount"
           value="{{ old('day_4_amount', $day_4_amount ?? '') }}"
           class="form-control @error('day_4_amount') is-invalid @enderror" required>
    @error('day_4_amount')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="day_5" class="form-label fw-semibold">Day 5</label>
    <input type="text" name="day_5" id="day_5"
           value="{{ old('day_5', $day_5 ?? '') }}"
           class="form-control @error('day_5') is-invalid @enderror" required>
    @error('day_5')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="day_5_amount" class="form-label fw-semibold">Day 5 Amount</label>
    <input type="number" name="day_5_amount" id="day_5_amount"
           value="{{ old('day_5_amount', $day_5_amount ?? '') }}"
           class="form-control @error('day_5_amount') is-invalid @enderror" required>
    @error('day_5_amount')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="day_6" class="form-label fw-semibold">Day 6</label>
    <input type="text" name="day_6" id="day_6"
           value="{{ old('day_6', $day_6 ?? '') }}"
           class="form-control @error('day_6') is-invalid @enderror" required>
    @error('day_6')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="day_6_amount" class="form-label fw-semibold">Day 6 Amount</label>
    <input type="number" name="day_6_amount" id="day_6_amount"
           value="{{ old('day_6_amount', $day_6_amount ?? '') }}"
           class="form-control @error('day_6_amount') is-invalid @enderror" required>
    @error('day_6_amount')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="day_7" class="form-label fw-semibold">Day 7</label>
    <input type="text" name="day_7" id="day_7"
           value="{{ old('day_7', $day_7 ?? '') }}"
           class="form-control @error('day_7') is-invalid @enderror" required>
    @error('day_7')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="day_7_amount" class="form-label fw-semibold">Day 7 Amount</label>
    <input type="number" name="day_7_amount" id="day_7_amount"
           value="{{ old('day_7_amount', $day_7_amount ?? '') }}"
           class="form-control @error('day_7_amount') is-invalid @enderror" required>
    @error('day_7_amount')
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