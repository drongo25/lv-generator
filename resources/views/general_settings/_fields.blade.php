<div class="mb-3">
    <label for="title" class="form-label fw-semibold">Title</label>
    <input type="text" name="title" id="title"
           value="{{ old('title', $title ?? '') }}"
           class="form-control @error('title') is-invalid @enderror">
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="hotel_name" class="form-label fw-semibold">Hotel Name</label>
    <input type="text" name="hotel_name" id="hotel_name"
           value="{{ old('hotel_name', $hotel_name ?? '') }}"
           class="form-control @error('hotel_name') is-invalid @enderror">
    @error('hotel_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="hotel_email" class="form-label fw-semibold">Hotel Email</label>
    <input type="email" name="hotel_email" id="hotel_email"
           value="{{ old('hotel_email', $hotel_email ?? '') }}"
           class="form-control @error('hotel_email') is-invalid @enderror">
    @error('hotel_email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="hotel_phone" class="form-label fw-semibold">Hotel Phone</label>
    <input type="tel" name="hotel_phone" id="hotel_phone"
           value="{{ old('hotel_phone', $hotel_phone ?? '') }}"
           class="form-control @error('hotel_phone') is-invalid @enderror">
    @error('hotel_phone')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="hotel_address" class="form-label fw-semibold">Hotel Address</label>
    <textarea name="hotel_address" id="hotel_address" rows="4"
              class="form-control @error('hotel_address') is-invalid @enderror">{{ old('hotel_address', $hotel_address ?? '') }}</textarea>
    @error('hotel_address')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="color" class="form-label fw-semibold">Color</label>
    <input type="color" name="color" id="color"
           value="{{ old('color', $color ?? '') }}"
           class="form-control @error('color') is-invalid @enderror">
    @error('color')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="cur" class="form-label fw-semibold">Cur</label>
    <input type="text" name="cur" id="cur"
           value="{{ old('cur', $cur ?? '') }}"
           class="form-control @error('cur') is-invalid @enderror">
    @error('cur')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="cur_sym" class="form-label fw-semibold">Cur Sym</label>
    <input type="text" name="cur_sym" id="cur_sym"
           value="{{ old('cur_sym', $cur_sym ?? '') }}"
           class="form-control @error('cur_sym') is-invalid @enderror">
    @error('cur_sym')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="reg" class="form-label fw-semibold">Reg</label>
    <input type="text" name="reg" id="reg"
           value="{{ old('reg', $reg ?? '') }}"
           class="form-control @error('reg') is-invalid @enderror" required>
    @error('reg')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="ev" class="form-label fw-semibold">Ev</label>
    <input type="text" name="ev" id="ev"
           value="{{ old('ev', $ev ?? '') }}"
           class="form-control @error('ev') is-invalid @enderror" required>
    @error('ev')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="mv" class="form-label fw-semibold">Mv</label>
    <input type="text" name="mv" id="mv"
           value="{{ old('mv', $mv ?? '') }}"
           class="form-control @error('mv') is-invalid @enderror" required>
    @error('mv')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="en" class="form-label fw-semibold">En</label>
    <input type="text" name="en" id="en"
           value="{{ old('en', $en ?? '') }}"
           class="form-control @error('en') is-invalid @enderror" required>
    @error('en')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="mn" class="form-label fw-semibold">Mn</label>
    <input type="text" name="mn" id="mn"
           value="{{ old('mn', $mn ?? '') }}"
           class="form-control @error('mn') is-invalid @enderror" required>
    @error('mn')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="sender_email" class="form-label fw-semibold">Sender Email</label>
    <input type="email" name="sender_email" id="sender_email"
           value="{{ old('sender_email', $sender_email ?? '') }}"
           class="form-control @error('sender_email') is-invalid @enderror">
    @error('sender_email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="email_message" class="form-label fw-semibold">Email Message</label>
    <input type="email" name="email_message" id="email_message"
           value="{{ old('email_message', $email_message ?? '') }}"
           class="form-control @error('email_message') is-invalid @enderror">
    @error('email_message')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="sms_api" class="form-label fw-semibold">Sms Api</label>
    <textarea name="sms_api" id="sms_api" rows="4"
              class="form-control @error('sms_api') is-invalid @enderror">{{ old('sms_api', $sms_api ?? '') }}</textarea>
    @error('sms_api')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="meta_key_word" class="form-label fw-semibold">Meta Key Word</label>
    <textarea name="meta_key_word" id="meta_key_word" rows="4"
              class="form-control @error('meta_key_word') is-invalid @enderror">{{ old('meta_key_word', $meta_key_word ?? '') }}</textarea>
    @error('meta_key_word')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="meta_description" class="form-label fw-semibold">Meta Description</label>
    <textarea name="meta_description" id="meta_description" rows="4"
              class="form-control @error('meta_description') is-invalid @enderror">{{ old('meta_description', $meta_description ?? '') }}</textarea>
    @error('meta_description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="meta_author" class="form-label fw-semibold">Meta Author</label>
    <input type="text" name="meta_author" id="meta_author"
           value="{{ old('meta_author', $meta_author ?? '') }}"
           class="form-control @error('meta_author') is-invalid @enderror">
    @error('meta_author')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>