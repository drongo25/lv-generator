<div class="mb-3">
    <label for="question" class="form-label fw-semibold">Question</label>
    <input type="text" name="question" id="question"
           value="{{ old('question', $webFaq->question ?? '') }}"
           class="form-control @error('question') is-invalid @enderror">
    @error('question')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="answer" class="form-label fw-semibold">Answer</label>
    <textarea name="answer" id="answer" rows="4"
              class="form-control @error('answer') is-invalid @enderror">{{ old('answer', $webFaq->answer ?? '') }}</textarea>
    @error('answer')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>