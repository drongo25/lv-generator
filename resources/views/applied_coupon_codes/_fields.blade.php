<div class="mb-3">
    <label for="reservation_id" class="form-label fw-semibold">Reservation Id</label>
    <input type="number" name="reservation_id" id="reservation_id"
           value="{{ old('reservation_id', $appliedCouponCode->reservation_id ?? '') }}"
           class="form-control @error('reservation_id') is-invalid @enderror" required>
    @error('reservation_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="coupon_id" class="form-label fw-semibold">Coupon Id</label>
    <input type="number" name="coupon_id" id="coupon_id"
           value="{{ old('coupon_id', $appliedCouponCode->coupon_id ?? '') }}"
           class="form-control @error('coupon_id') is-invalid @enderror" required>
    @error('coupon_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="user_id" class="form-label fw-semibold">User Id</label>
    <input type="number" name="user_id" id="user_id"
           value="{{ old('user_id', $appliedCouponCode->user_id ?? '') }}"
           class="form-control @error('user_id') is-invalid @enderror" required>
    @error('user_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="date" class="form-label fw-semibold">Date</label>
    <input type="date" name="date" id="date"
           value="{{ old('date', $appliedCouponCode->date ?? '') }}"
           class="form-control @error('date') is-invalid @enderror" required>
    @error('date')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="status" class="form-label fw-semibold">Status</label>
    <input type="text" name="status" id="status"
           value="{{ old('status', $appliedCouponCode->status ?? '') }}"
           class="form-control @error('status') is-invalid @enderror" required>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="coupon_type" class="form-label fw-semibold">Coupon Type</label>
    <input type="text" name="coupon_type" id="coupon_type"
           value="{{ old('coupon_type', $appliedCouponCode->coupon_type ?? '') }}"
           class="form-control @error('coupon_type') is-invalid @enderror">
    @error('coupon_type')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="coupon_rate" class="form-label fw-semibold">Coupon Rate</label>
    <input type="number" name="coupon_rate" id="coupon_rate"
           value="{{ old('coupon_rate', $appliedCouponCode->coupon_rate ?? '') }}"
           class="form-control @error('coupon_rate') is-invalid @enderror" required>
    @error('coupon_rate')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>