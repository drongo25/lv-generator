<div class="mb-3">
    <label for="main_name" class="form-label fw-semibold">Main Name</label>
    <input type="text" name="main_name" id="main_name"
           value="{{ old('main_name', $gateway->main_name ?? '') }}"
           class="form-control @error('main_name') is-invalid @enderror" required>
    @error('main_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="name" class="form-label fw-semibold">Name</label>
    <input type="text" name="name" id="name"
           value="{{ old('name', $gateway->name ?? '') }}"
           class="form-control @error('name') is-invalid @enderror">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="minamo" class="form-label fw-semibold">Minamo</label>
    <input type="number" name="minamo" id="minamo"
           value="{{ old('minamo', $gateway->minamo ?? '') }}"
           class="form-control @error('minamo') is-invalid @enderror" required>
    @error('minamo')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="maxamo" class="form-label fw-semibold">Maxamo</label>
    <input type="number" name="maxamo" id="maxamo"
           value="{{ old('maxamo', $gateway->maxamo ?? '') }}"
           class="form-control @error('maxamo') is-invalid @enderror" required>
    @error('maxamo')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="fixed_charge" class="form-label fw-semibold">Fixed Charge</label>
    <input type="number" name="fixed_charge" id="fixed_charge"
           value="{{ old('fixed_charge', $gateway->fixed_charge ?? '') }}"
           class="form-control @error('fixed_charge') is-invalid @enderror" required>
    @error('fixed_charge')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="percent_charge" class="form-label fw-semibold">Percent Charge</label>
    <input type="number" name="percent_charge" id="percent_charge"
           value="{{ old('percent_charge', $gateway->percent_charge ?? '') }}"
           class="form-control @error('percent_charge') is-invalid @enderror" required>
    @error('percent_charge')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="rate" class="form-label fw-semibold">Rate</label>
    <input type="number" name="rate" id="rate"
           value="{{ old('rate', $gateway->rate ?? '') }}"
           class="form-control @error('rate') is-invalid @enderror" required>
    @error('rate')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="val1" class="form-label fw-semibold">Val1</label>
    <input type="text" name="val1" id="val1"
           value="{{ old('val1', $gateway->val1 ?? '') }}"
           class="form-control @error('val1') is-invalid @enderror">
    @error('val1')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="val2" class="form-label fw-semibold">Val2</label>
    <input type="text" name="val2" id="val2"
           value="{{ old('val2', $gateway->val2 ?? '') }}"
           class="form-control @error('val2') is-invalid @enderror">
    @error('val2')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="val3" class="form-label fw-semibold">Val3</label>
    <input type="text" name="val3" id="val3"
           value="{{ old('val3', $gateway->val3 ?? '') }}"
           class="form-control @error('val3') is-invalid @enderror">
    @error('val3')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="val4" class="form-label fw-semibold">Val4</label>
    <input type="text" name="val4" id="val4"
           value="{{ old('val4', $gateway->val4 ?? '') }}"
           class="form-control @error('val4') is-invalid @enderror">
    @error('val4')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="val5" class="form-label fw-semibold">Val5</label>
    <input type="text" name="val5" id="val5"
           value="{{ old('val5', $gateway->val5 ?? '') }}"
           class="form-control @error('val5') is-invalid @enderror">
    @error('val5')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="val6" class="form-label fw-semibold">Val6</label>
    <input type="text" name="val6" id="val6"
           value="{{ old('val6', $gateway->val6 ?? '') }}"
           class="form-control @error('val6') is-invalid @enderror">
    @error('val6')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="val7" class="form-label fw-semibold">Val7</label>
    <input type="text" name="val7" id="val7"
           value="{{ old('val7', $gateway->val7 ?? '') }}"
           class="form-control @error('val7') is-invalid @enderror">
    @error('val7')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="status" class="form-label fw-semibold">Status</label>
    <input type="text" name="status" id="status"
           value="{{ old('status', $gateway->status ?? '') }}"
           class="form-control @error('status') is-invalid @enderror" required>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>