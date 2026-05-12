<div class="mb-3">
    <label for="username" class="form-label fw-semibold">Username</label>
    <input type="text" name="username" id="username"
           value="{{ old('username', $username ?? '') }}"
           class="form-control @error('username') is-invalid @enderror" required>
    @error('username')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="email" class="form-label fw-semibold">Email</label>
    <input type="email" name="email" id="email"
           value="{{ old('email', $email ?? '') }}"
           class="form-control @error('email') is-invalid @enderror" required>
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="first_name" class="form-label fw-semibold">First Name</label>
    <input type="text" name="first_name" id="first_name"
           value="{{ old('first_name', $first_name ?? '') }}"
           class="form-control @error('first_name') is-invalid @enderror">
    @error('first_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="last_name" class="form-label fw-semibold">Last Name</label>
    <input type="text" name="last_name" id="last_name"
           value="{{ old('last_name', $last_name ?? '') }}"
           class="form-control @error('last_name') is-invalid @enderror">
    @error('last_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="phone" class="form-label fw-semibold">Phone</label>
    <input type="tel" name="phone" id="phone"
           value="{{ old('phone', $phone ?? '') }}"
           class="form-control @error('phone') is-invalid @enderror">
    @error('phone')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="address" class="form-label fw-semibold">Address</label>
    <textarea name="address" id="address" rows="4"
              class="form-control @error('address') is-invalid @enderror">{{ old('address', $address ?? '') }}</textarea>
    @error('address')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="sex" class="form-label fw-semibold">Sex</label>
    <input type="text" name="sex" id="sex"
           value="{{ old('sex', $sex ?? '') }}"
           class="form-control @error('sex') is-invalid @enderror" required>
    @error('sex')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="picture" class="form-label fw-semibold">Picture</label>
    <input type="text" name="picture" id="picture"
           value="{{ old('picture', $picture ?? '') }}"
           class="form-control @error('picture') is-invalid @enderror">
    @error('picture')
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

<div class="mb-3">
    <label for="password" class="form-label fw-semibold">Password</label>
    <input type="password" name="password" id="password"
           value="{{ old('password', $password ?? '') }}"
           class="form-control @error('password') is-invalid @enderror" required>
    @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="remember_token" class="form-label fw-semibold">Remember Token</label>
    <input type="text" name="remember_token" id="remember_token"
           value="{{ old('remember_token', $remember_token ?? '') }}"
           class="form-control @error('remember_token') is-invalid @enderror">
    @error('remember_token')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="role" class="form-label fw-semibold">Role</label>
    <input type="number" name="role" id="role"
           value="{{ old('role', $role ?? '') }}"
           class="form-control @error('role') is-invalid @enderror" required>
    @error('role')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>