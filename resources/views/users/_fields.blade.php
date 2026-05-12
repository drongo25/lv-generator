<div class="mb-3">
    <label for="username" class="form-label fw-semibold">Username</label>
    <input type="text" name="username" id="username"
           value="{{ old('username', $user->username ?? '') }}"
           class="form-control @error('username') is-invalid @enderror" required>
    @error('username')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="email" class="form-label fw-semibold">Email</label>
    <input type="email" name="email" id="email"
           value="{{ old('email', $user->email ?? '') }}"
           class="form-control @error('email') is-invalid @enderror" required>
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="first_name" class="form-label fw-semibold">First Name</label>
    <input type="text" name="first_name" id="first_name"
           value="{{ old('first_name', $user->first_name ?? '') }}"
           class="form-control @error('first_name') is-invalid @enderror">
    @error('first_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="last_name" class="form-label fw-semibold">Last Name</label>
    <input type="text" name="last_name" id="last_name"
           value="{{ old('last_name', $user->last_name ?? '') }}"
           class="form-control @error('last_name') is-invalid @enderror">
    @error('last_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="phone" class="form-label fw-semibold">Phone</label>
    <input type="tel" name="phone" id="phone"
           value="{{ old('phone', $user->phone ?? '') }}"
           class="form-control @error('phone') is-invalid @enderror">
    @error('phone')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="dob" class="form-label fw-semibold">Dob</label>
    <input type="date" name="dob" id="dob"
           value="{{ old('dob', $user->dob ?? '') }}"
           class="form-control @error('dob') is-invalid @enderror" required>
    @error('dob')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="address" class="form-label fw-semibold">Address</label>
    <textarea name="address" id="address" rows="4"
              class="form-control @error('address') is-invalid @enderror">{{ old('address', $user->address ?? '') }}</textarea>
    @error('address')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="sex" class="form-label fw-semibold">Sex</label>
    <input type="text" name="sex" id="sex"
           value="{{ old('sex', $user->sex ?? '') }}"
           class="form-control @error('sex') is-invalid @enderror" required>
    @error('sex')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="picture" class="form-label fw-semibold">Picture</label>
    <input type="file" name="picture" id="picture"
           class="form-control @error('picture') is-invalid @enderror">
    @error('picture')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="password" class="form-label fw-semibold">
        Password
        <small class="text-muted fw-normal">(leave blank to keep current)</small>
    </label>
    <input type="password" name="password" id="password"
           class="form-control @error('password') is-invalid @enderror">
    @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="id_type" class="form-label fw-semibold">Id Type</label>
    <input type="text" name="id_type" id="id_type"
           value="{{ old('id_type', $user->id_type ?? '') }}"
           class="form-control @error('id_type') is-invalid @enderror">
    @error('id_type')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="id_number" class="form-label fw-semibold">Id Number</label>
    <input type="text" name="id_number" id="id_number"
           value="{{ old('id_number', $user->id_number ?? '') }}"
           class="form-control @error('id_number') is-invalid @enderror">
    @error('id_number')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="id_card_image" class="form-label fw-semibold">Id Card Image</label>
    <input type="text" name="id_card_image" id="id_card_image"
           value="{{ old('id_card_image', $user->id_card_image ?? '') }}"
           class="form-control @error('id_card_image') is-invalid @enderror">
    @error('id_card_image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="remarks" class="form-label fw-semibold">Remarks</label>
    <textarea name="remarks" id="remarks" rows="4"
              class="form-control @error('remarks') is-invalid @enderror">{{ old('remarks', $user->remarks ?? '') }}</textarea>
    @error('remarks')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="vip" class="form-label fw-semibold">Vip</label>
    <input type="text" name="vip" id="vip"
           value="{{ old('vip', $user->vip ?? '') }}"
           class="form-control @error('vip') is-invalid @enderror" required>
    @error('vip')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="email_verified" class="form-label fw-semibold">Email Verified</label>
    <input type="email" name="email_verified" id="email_verified"
           value="{{ old('email_verified', $user->email_verified ?? '') }}"
           class="form-control @error('email_verified') is-invalid @enderror" required>
    @error('email_verified')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="email_verified_code" class="form-label fw-semibold">Email Verified Code</label>
    <input type="email" name="email_verified_code" id="email_verified_code"
           value="{{ old('email_verified_code', $user->email_verified_code ?? '') }}"
           class="form-control @error('email_verified_code') is-invalid @enderror">
    @error('email_verified_code')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="sms_verified" class="form-label fw-semibold">Sms Verified</label>
    <input type="text" name="sms_verified" id="sms_verified"
           value="{{ old('sms_verified', $user->sms_verified ?? '') }}"
           class="form-control @error('sms_verified') is-invalid @enderror" required>
    @error('sms_verified')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="sms_verified_code" class="form-label fw-semibold">Sms Verified Code</label>
    <input type="text" name="sms_verified_code" id="sms_verified_code"
           value="{{ old('sms_verified_code', $user->sms_verified_code ?? '') }}"
           class="form-control @error('sms_verified_code') is-invalid @enderror">
    @error('sms_verified_code')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="status" class="form-label fw-semibold">Status</label>
    <input type="text" name="status" id="status"
           value="{{ old('status', $user->status ?? '') }}"
           class="form-control @error('status') is-invalid @enderror" required>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>