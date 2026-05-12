<div class="mb-3">
    <label for="username" class="form-label fw-semibold">Username</label>
    <input type="text" name="username" id="username"
           value="{{ old('username', $admin->username ?? '') }}"
           class="form-control @error('username') is-invalid @enderror" required>
    @error('username')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="email" class="form-label fw-semibold">Email</label>
    <input type="email" name="email" id="email"
           value="{{ old('email', $admin->email ?? '') }}"
           class="form-control @error('email') is-invalid @enderror" required>
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="first_name" class="form-label fw-semibold">First Name</label>
    <input type="text" name="first_name" id="first_name"
           value="{{ old('first_name', $admin->first_name ?? '') }}"
           class="form-control @error('first_name') is-invalid @enderror">
    @error('first_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="last_name" class="form-label fw-semibold">Last Name</label>
    <input type="text" name="last_name" id="last_name"
           value="{{ old('last_name', $admin->last_name ?? '') }}"
           class="form-control @error('last_name') is-invalid @enderror">
    @error('last_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="phone" class="form-label fw-semibold">Phone</label>
    <input type="tel" name="phone" id="phone"
           value="{{ old('phone', $admin->phone ?? '') }}"
           class="form-control @error('phone') is-invalid @enderror">
    @error('phone')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="address" class="form-label fw-semibold">Address</label>
    <textarea name="address" id="address" rows="4"
              class="form-control @error('address') is-invalid @enderror">{{ old('address', $admin->address ?? '') }}</textarea>
    @error('address')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="sex" class="form-label fw-semibold">Sex</label>
    <input type="text" name="sex" id="sex"
           value="{{ old('sex', $admin->sex ?? '') }}"
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
    <label for="status" class="form-label fw-semibold">Status</label>
    <input type="text" name="status" id="status"
           value="{{ old('status', $admin->status ?? '') }}"
           class="form-control @error('status') is-invalid @enderror" required>
    @error('status')
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
    <label for="role" class="form-label fw-semibold">Role</label>
    <input type="number" name="role" id="role"
           value="{{ old('role', $admin->role ?? '') }}"
           class="form-control @error('role') is-invalid @enderror" required>
    @error('role')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>