<div class="mb-3">
    <label for="reservation_id" class="form-label fw-semibold">Reservation Id</label>
    <input type="number" name="reservation_id" id="reservation_id"
           value="{{ old('reservation_id', $reservation_id ?? '') }}"
           class="form-control @error('reservation_id') is-invalid @enderror" required>
    @error('reservation_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="pad_service_id" class="form-label fw-semibold">Pad Service Id</label>
    <input type="number" name="pad_service_id" id="pad_service_id"
           value="{{ old('pad_service_id', $pad_service_id ?? '') }}"
           class="form-control @error('pad_service_id') is-invalid @enderror" required>
    @error('pad_service_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="price_type" class="form-label fw-semibold">Price Type</label>
    <input type="text" name="price_type" id="price_type"
           value="{{ old('price_type', $price_type ?? '') }}"
           class="form-control @error('price_type') is-invalid @enderror" required>
    @error('price_type')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="value" class="form-label fw-semibold">Value</label>
    <input type="number" name="value" id="value"
           value="{{ old('value', $value ?? '') }}"
           class="form-control @error('value') is-invalid @enderror" required>
    @error('value')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="price" class="form-label fw-semibold">Price</label>
    <input type="number" name="price" id="price"
           value="{{ old('price', $price ?? '') }}"
           class="form-control @error('price') is-invalid @enderror" required>
    @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>