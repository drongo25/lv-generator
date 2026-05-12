<div class="mb-3">
    <label for="feed" class="form-label fw-semibold">Feed</label>
    <textarea name="feed" id="feed" rows="4"
              class="form-control @error('feed') is-invalid @enderror">{{ old('feed', $webOurClientFeedback->feed ?? '') }}</textarea>
    @error('feed')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="name" class="form-label fw-semibold">Name</label>
    <input type="text" name="name" id="name"
           value="{{ old('name', $webOurClientFeedback->name ?? '') }}"
           class="form-control @error('name') is-invalid @enderror">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="title" class="form-label fw-semibold">Title</label>
    <input type="text" name="title" id="title"
           value="{{ old('title', $webOurClientFeedback->title ?? '') }}"
           class="form-control @error('title') is-invalid @enderror">
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>