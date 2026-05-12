<div class="mb-3">
    <label for="home_banner_section_title_1" class="form-label fw-semibold">Home Banner Section Title 1</label>
    <textarea name="home_banner_section_title_1" id="home_banner_section_title_1" rows="4"
              class="form-control @error('home_banner_section_title_1') is-invalid @enderror">{{ old('home_banner_section_title_1', $home_banner_section_title_1 ?? '') }}</textarea>
    @error('home_banner_section_title_1')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="home_banner_section_title_2" class="form-label fw-semibold">Home Banner Section Title 2</label>
    <textarea name="home_banner_section_title_2" id="home_banner_section_title_2" rows="4"
              class="form-control @error('home_banner_section_title_2') is-invalid @enderror">{{ old('home_banner_section_title_2', $home_banner_section_title_2 ?? '') }}</textarea>
    @error('home_banner_section_title_2')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="home_banner_section_title_3" class="form-label fw-semibold">Home Banner Section Title 3</label>
    <textarea name="home_banner_section_title_3" id="home_banner_section_title_3" rows="4"
              class="form-control @error('home_banner_section_title_3') is-invalid @enderror">{{ old('home_banner_section_title_3', $home_banner_section_title_3 ?? '') }}</textarea>
    @error('home_banner_section_title_3')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="home_about_section_title" class="form-label fw-semibold">Home About Section Title</label>
    <textarea name="home_about_section_title" id="home_about_section_title" rows="4"
              class="form-control @error('home_about_section_title') is-invalid @enderror">{{ old('home_about_section_title', $home_about_section_title ?? '') }}</textarea>
    @error('home_about_section_title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="home_about_section_short_details" class="form-label fw-semibold">Home About Section Short Details</label>
    <textarea name="home_about_section_short_details" id="home_about_section_short_details" rows="4"
              class="form-control @error('home_about_section_short_details') is-invalid @enderror">{{ old('home_about_section_short_details', $home_about_section_short_details ?? '') }}</textarea>
    @error('home_about_section_short_details')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="home_about_section_long_details" class="form-label fw-semibold">Home About Section Long Details</label>
    <textarea name="home_about_section_long_details" id="home_about_section_long_details" rows="4"
              class="form-control @error('home_about_section_long_details') is-invalid @enderror">{{ old('home_about_section_long_details', $home_about_section_long_details ?? '') }}</textarea>
    @error('home_about_section_long_details')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="home_room_section_title" class="form-label fw-semibold">Home Room Section Title</label>
    <input type="text" name="home_room_section_title" id="home_room_section_title"
           value="{{ old('home_room_section_title', $home_room_section_title ?? '') }}"
           class="form-control @error('home_room_section_title') is-invalid @enderror">
    @error('home_room_section_title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="home_room_section_title_sub" class="form-label fw-semibold">Home Room Section Title Sub</label>
    <input type="text" name="home_room_section_title_sub" id="home_room_section_title_sub"
           value="{{ old('home_room_section_title_sub', $home_room_section_title_sub ?? '') }}"
           class="form-control @error('home_room_section_title_sub') is-invalid @enderror">
    @error('home_room_section_title_sub')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="home_team_section_title_1" class="form-label fw-semibold">Home Team Section Title 1</label>
    <textarea name="home_team_section_title_1" id="home_team_section_title_1" rows="4"
              class="form-control @error('home_team_section_title_1') is-invalid @enderror">{{ old('home_team_section_title_1', $home_team_section_title_1 ?? '') }}</textarea>
    @error('home_team_section_title_1')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="home_team_section_title_2" class="form-label fw-semibold">Home Team Section Title 2</label>
    <textarea name="home_team_section_title_2" id="home_team_section_title_2" rows="4"
              class="form-control @error('home_team_section_title_2') is-invalid @enderror">{{ old('home_team_section_title_2', $home_team_section_title_2 ?? '') }}</textarea>
    @error('home_team_section_title_2')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="home_service_section_title" class="form-label fw-semibold">Home Service Section Title</label>
    <input type="text" name="home_service_section_title" id="home_service_section_title"
           value="{{ old('home_service_section_title', $home_service_section_title ?? '') }}"
           class="form-control @error('home_service_section_title') is-invalid @enderror">
    @error('home_service_section_title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="home_service_section_sub_title" class="form-label fw-semibold">Home Service Section Sub Title</label>
    <input type="text" name="home_service_section_sub_title" id="home_service_section_sub_title"
           value="{{ old('home_service_section_sub_title', $home_service_section_sub_title ?? '') }}"
           class="form-control @error('home_service_section_sub_title') is-invalid @enderror">
    @error('home_service_section_sub_title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="home_video_section_title" class="form-label fw-semibold">Home Video Section Title</label>
    <input type="text" name="home_video_section_title" id="home_video_section_title"
           value="{{ old('home_video_section_title', $home_video_section_title ?? '') }}"
           class="form-control @error('home_video_section_title') is-invalid @enderror">
    @error('home_video_section_title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="home_video_section_sub_title" class="form-label fw-semibold">Home Video Section Sub Title</label>
    <input type="text" name="home_video_section_sub_title" id="home_video_section_sub_title"
           value="{{ old('home_video_section_sub_title', $home_video_section_sub_title ?? '') }}"
           class="form-control @error('home_video_section_sub_title') is-invalid @enderror">
    @error('home_video_section_sub_title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="home_video_section_video_link" class="form-label fw-semibold">Home Video Section Video Link</label>
    <input type="text" name="home_video_section_video_link" id="home_video_section_video_link"
           value="{{ old('home_video_section_video_link', $home_video_section_video_link ?? '') }}"
           class="form-control @error('home_video_section_video_link') is-invalid @enderror">
    @error('home_video_section_video_link')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="gallery_gallery_section_title_1" class="form-label fw-semibold">Gallery Gallery Section Title 1</label>
    <textarea name="gallery_gallery_section_title_1" id="gallery_gallery_section_title_1" rows="4"
              class="form-control @error('gallery_gallery_section_title_1') is-invalid @enderror">{{ old('gallery_gallery_section_title_1', $gallery_gallery_section_title_1 ?? '') }}</textarea>
    @error('gallery_gallery_section_title_1')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="gallery_gallery_section_title_2" class="form-label fw-semibold">Gallery Gallery Section Title 2</label>
    <textarea name="gallery_gallery_section_title_2" id="gallery_gallery_section_title_2" rows="4"
              class="form-control @error('gallery_gallery_section_title_2') is-invalid @enderror">{{ old('gallery_gallery_section_title_2', $gallery_gallery_section_title_2 ?? '') }}</textarea>
    @error('gallery_gallery_section_title_2')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="home_testimonial_section_title_1" class="form-label fw-semibold">Home Testimonial Section Title 1</label>
    <textarea name="home_testimonial_section_title_1" id="home_testimonial_section_title_1" rows="4"
              class="form-control @error('home_testimonial_section_title_1') is-invalid @enderror">{{ old('home_testimonial_section_title_1', $home_testimonial_section_title_1 ?? '') }}</textarea>
    @error('home_testimonial_section_title_1')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="home_testimonial_section_title_2" class="form-label fw-semibold">Home Testimonial Section Title 2</label>
    <textarea name="home_testimonial_section_title_2" id="home_testimonial_section_title_2" rows="4"
              class="form-control @error('home_testimonial_section_title_2') is-invalid @enderror">{{ old('home_testimonial_section_title_2', $home_testimonial_section_title_2 ?? '') }}</textarea>
    @error('home_testimonial_section_title_2')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="home_facility_section_title_1" class="form-label fw-semibold">Home Facility Section Title 1</label>
    <input type="text" name="home_facility_section_title_1" id="home_facility_section_title_1"
           value="{{ old('home_facility_section_title_1', $home_facility_section_title_1 ?? '') }}"
           class="form-control @error('home_facility_section_title_1') is-invalid @enderror">
    @error('home_facility_section_title_1')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="home_facility_section_title_2" class="form-label fw-semibold">Home Facility Section Title 2</label>
    <input type="text" name="home_facility_section_title_2" id="home_facility_section_title_2"
           value="{{ old('home_facility_section_title_2', $home_facility_section_title_2 ?? '') }}"
           class="form-control @error('home_facility_section_title_2') is-invalid @enderror">
    @error('home_facility_section_title_2')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="general_general_section_footer_content" class="form-label fw-semibold">General General Section Footer Content</label>
    <textarea name="general_general_section_footer_content" id="general_general_section_footer_content" rows="4"
              class="form-control @error('general_general_section_footer_content') is-invalid @enderror">{{ old('general_general_section_footer_content', $general_general_section_footer_content ?? '') }}</textarea>
    @error('general_general_section_footer_content')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="general_general_section_fb_comment_script" class="form-label fw-semibold">General General Section Fb Comment Script</label>
    <textarea name="general_general_section_fb_comment_script" id="general_general_section_fb_comment_script" rows="4"
              class="form-control @error('general_general_section_fb_comment_script') is-invalid @enderror">{{ old('general_general_section_fb_comment_script', $general_general_section_fb_comment_script ?? '') }}</textarea>
    @error('general_general_section_fb_comment_script')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="blog_blog_section_title_1" class="form-label fw-semibold">Blog Blog Section Title 1</label>
    <input type="text" name="blog_blog_section_title_1" id="blog_blog_section_title_1"
           value="{{ old('blog_blog_section_title_1', $blog_blog_section_title_1 ?? '') }}"
           class="form-control @error('blog_blog_section_title_1') is-invalid @enderror">
    @error('blog_blog_section_title_1')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="blog_blog_section_title_2" class="form-label fw-semibold">Blog Blog Section Title 2</label>
    <input type="text" name="blog_blog_section_title_2" id="blog_blog_section_title_2"
           value="{{ old('blog_blog_section_title_2', $blog_blog_section_title_2 ?? '') }}"
           class="form-control @error('blog_blog_section_title_2') is-invalid @enderror">
    @error('blog_blog_section_title_2')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="faq_faq_section_title_1" class="form-label fw-semibold">Faq Faq Section Title 1</label>
    <textarea name="faq_faq_section_title_1" id="faq_faq_section_title_1" rows="4"
              class="form-control @error('faq_faq_section_title_1') is-invalid @enderror">{{ old('faq_faq_section_title_1', $faq_faq_section_title_1 ?? '') }}</textarea>
    @error('faq_faq_section_title_1')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="faq_faq_section_title_2" class="form-label fw-semibold">Faq Faq Section Title 2</label>
    <textarea name="faq_faq_section_title_2" id="faq_faq_section_title_2" rows="4"
              class="form-control @error('faq_faq_section_title_2') is-invalid @enderror">{{ old('faq_faq_section_title_2', $faq_faq_section_title_2 ?? '') }}</textarea>
    @error('faq_faq_section_title_2')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="contact_all_section_title_1" class="form-label fw-semibold">Contact All Section Title 1</label>
    <textarea name="contact_all_section_title_1" id="contact_all_section_title_1" rows="4"
              class="form-control @error('contact_all_section_title_1') is-invalid @enderror">{{ old('contact_all_section_title_1', $contact_all_section_title_1 ?? '') }}</textarea>
    @error('contact_all_section_title_1')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="contact_all_section_title_2" class="form-label fw-semibold">Contact All Section Title 2</label>
    <textarea name="contact_all_section_title_2" id="contact_all_section_title_2" rows="4"
              class="form-control @error('contact_all_section_title_2') is-invalid @enderror">{{ old('contact_all_section_title_2', $contact_all_section_title_2 ?? '') }}</textarea>
    @error('contact_all_section_title_2')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="contact_all_section_phone" class="form-label fw-semibold">Contact All Section Phone</label>
    <input type="tel" name="contact_all_section_phone" id="contact_all_section_phone"
           value="{{ old('contact_all_section_phone', $contact_all_section_phone ?? '') }}"
           class="form-control @error('contact_all_section_phone') is-invalid @enderror">
    @error('contact_all_section_phone')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="contact_all_section_email_web" class="form-label fw-semibold">Contact All Section Email Web</label>
    <input type="email" name="contact_all_section_email_web" id="contact_all_section_email_web"
           value="{{ old('contact_all_section_email_web', $contact_all_section_email_web ?? '') }}"
           class="form-control @error('contact_all_section_email_web') is-invalid @enderror">
    @error('contact_all_section_email_web')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="contact_all_section_address" class="form-label fw-semibold">Contact All Section Address</label>
    <textarea name="contact_all_section_address" id="contact_all_section_address" rows="4"
              class="form-control @error('contact_all_section_address') is-invalid @enderror">{{ old('contact_all_section_address', $contact_all_section_address ?? '') }}</textarea>
    @error('contact_all_section_address')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="contact_all_section_map" class="form-label fw-semibold">Contact All Section Map</label>
    <textarea name="contact_all_section_map" id="contact_all_section_map" rows="4"
              class="form-control @error('contact_all_section_map') is-invalid @enderror">{{ old('contact_all_section_map', $contact_all_section_map ?? '') }}</textarea>
    @error('contact_all_section_map')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>