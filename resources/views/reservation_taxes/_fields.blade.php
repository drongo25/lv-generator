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
    <label for="tax_id" class="form-label fw-semibold">Tax Id</label>
    <input type="number" name="tax_id" id="tax_id"
           value="{{ old('tax_id', $tax_id ?? '') }}"
           class="form-control @error('tax_id') is-invalid @enderror" required>
    @error('tax_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="type" class="form-label fw-semibold">Type</label>
    <input type="text" name="type" id="type"
           value="{{ old('type', $type ?? '') }}"
           class="form-control @error('type') is-invalid @enderror" required>
    @error('type')
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