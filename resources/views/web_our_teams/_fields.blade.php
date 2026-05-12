<div class="mb-3">
    <label for="name" class="form-label fw-semibold">Name</label>
    <input type="text" name="name" id="name"
           value="{{ old('name', $webOurTeam->name ?? '') }}"
           class="form-control @error('name') is-invalid @enderror">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="title" class="form-label fw-semibold">Title</label>
    <input type="text" name="title" id="title"
           value="{{ old('title', $webOurTeam->title ?? '') }}"
           class="form-control @error('title') is-invalid @enderror">
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="fb" class="form-label fw-semibold">Fb</label>
    <input type="text" name="fb" id="fb"
           value="{{ old('fb', $webOurTeam->fb ?? '') }}"
           class="form-control @error('fb') is-invalid @enderror">
    @error('fb')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="tw" class="form-label fw-semibold">Tw</label>
    <input type="text" name="tw" id="tw"
           value="{{ old('tw', $webOurTeam->tw ?? '') }}"
           class="form-control @error('tw') is-invalid @enderror">
    @error('tw')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="lin" class="form-label fw-semibold">Lin</label>
    <input type="text" name="lin" id="lin"
           value="{{ old('lin', $webOurTeam->lin ?? '') }}"
           class="form-control @error('lin') is-invalid @enderror">
    @error('lin')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="gp" class="form-label fw-semibold">Gp</label>
    <input type="text" name="gp" id="gp"
           value="{{ old('gp', $webOurTeam->gp ?? '') }}"
           class="form-control @error('gp') is-invalid @enderror">
    @error('gp')
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