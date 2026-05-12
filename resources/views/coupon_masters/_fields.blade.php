<div class="mb-3">
    <label for="offer_title" class="form-label fw-semibold">Offer Title</label>
    <input type="text" name="offer_title" id="offer_title"
           value="{{ old('offer_title', $couponMaster->offer_title ?? '') }}"
           class="form-control @error('offer_title') is-invalid @enderror" required>
    @error('offer_title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label fw-semibold">Description</label>
    <textarea name="description" id="description" rows="4"
              class="form-control @error('description') is-invalid @enderror">{{ old('description', $couponMaster->description ?? '') }}</textarea>
    @error('description')
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
    <label for="period_start_time" class="form-label fw-semibold">Period Start Time</label>
    <input type="datetime-local" name="period_start_time" id="period_start_time"
           value="{{ old('period_start_time', $couponMaster->period_start_time ?? '') }}"
           class="form-control @error('period_start_time') is-invalid @enderror" required>
    @error('period_start_time')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="period_end_time" class="form-label fw-semibold">Period End Time</label>
    <input type="datetime-local" name="period_end_time" id="period_end_time"
           value="{{ old('period_end_time', $couponMaster->period_end_time ?? '') }}"
           class="form-control @error('period_end_time') is-invalid @enderror" required>
    @error('period_end_time')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="code" class="form-label fw-semibold">Code</label>
    <input type="text" name="code" id="code"
           value="{{ old('code', $couponMaster->code ?? '') }}"
           class="form-control @error('code') is-invalid @enderror" required>
    @error('code')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="type" class="form-label fw-semibold">Type</label>
    <input type="text" name="type" id="type"
           value="{{ old('type', $couponMaster->type ?? '') }}"
           class="form-control @error('type') is-invalid @enderror" required>
    @error('type')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="value" class="form-label fw-semibold">Value</label>
    <input type="number" name="value" id="value"
           value="{{ old('value', $couponMaster->value ?? '') }}"
           class="form-control @error('value') is-invalid @enderror" required>
    @error('value')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="min_amount" class="form-label fw-semibold">Min Amount</label>
    <input type="number" name="min_amount" id="min_amount"
           value="{{ old('min_amount', $couponMaster->min_amount ?? '') }}"
           class="form-control @error('min_amount') is-invalid @enderror" required>
    @error('min_amount')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="max_amount" class="form-label fw-semibold">Max Amount</label>
    <input type="number" name="max_amount" id="max_amount"
           value="{{ old('max_amount', $couponMaster->max_amount ?? '') }}"
           class="form-control @error('max_amount') is-invalid @enderror" required>
    @error('max_amount')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="limit_per_user" class="form-label fw-semibold">Limit Per User</label>
    <input type="number" name="limit_per_user" id="limit_per_user"
           value="{{ old('limit_per_user', $couponMaster->limit_per_user ?? '') }}"
           class="form-control @error('limit_per_user') is-invalid @enderror" required>
    @error('limit_per_user')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="limit_per_coupon" class="form-label fw-semibold">Limit Per Coupon</label>
    <input type="number" name="limit_per_coupon" id="limit_per_coupon"
           value="{{ old('limit_per_coupon', $couponMaster->limit_per_coupon ?? '') }}"
           class="form-control @error('limit_per_coupon') is-invalid @enderror" required>
    @error('limit_per_coupon')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="status" class="form-label fw-semibold">Status</label>
    <input type="text" name="status" id="status"
           value="{{ old('status', $couponMaster->status ?? '') }}"
           class="form-control @error('status') is-invalid @enderror" required>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>