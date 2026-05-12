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
    <label for="paid_service_id" class="form-label fw-semibold">Paid Service Id</label>
    <input type="number" name="paid_service_id" id="paid_service_id"
           value="{{ old('paid_service_id', $paid_service_id ?? '') }}"
           class="form-control @error('paid_service_id') is-invalid @enderror" required>
    @error('paid_service_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>