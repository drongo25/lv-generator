@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Web Settings</h1>
    <a href="{{ route('web-settings.create') }}" class="btn btn-primary">+ Add New</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                <th>Home Banner Section Title 1</th>
                <th>Home Banner Section Title 2</th>
                <th>Home Banner Section Title 3</th>
                <th>Home About Section Title</th>
                <th>Home About Section Short Details</th>
                <th>Home About Section Long Details</th>
                <th>Home Room Section Title</th>
                <th>Home Room Section Title Sub</th>
                <th>Home Team Section Title 1</th>
                <th>Home Team Section Title 2</th>
                <th>Home Service Section Title</th>
                <th>Home Service Section Sub Title</th>
                <th>Home Video Section Title</th>
                <th>Home Video Section Sub Title</th>
                <th>Home Video Section Video Link</th>
                <th>Gallery Gallery Section Title 1</th>
                <th>Gallery Gallery Section Title 2</th>
                <th>Home Testimonial Section Title 1</th>
                <th>Home Testimonial Section Title 2</th>
                <th>Home Facility Section Title 1</th>
                <th>Home Facility Section Title 2</th>
                <th>General General Section Footer Content</th>
                <th>General General Section Fb Comment Script</th>
                <th>Blog Blog Section Title 1</th>
                <th>Blog Blog Section Title 2</th>
                <th>Faq Faq Section Title 1</th>
                <th>Faq Faq Section Title 2</th>
                <th>Contact All Section Title 1</th>
                <th>Contact All Section Title 2</th>
                <th>Contact All Section Phone</th>
                <th>Contact All Section Email Web</th>
                <th>Contact All Section Address</th>
                <th>Contact All Section Map</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($webSettings as $webSetting)
                    <tr>
                <td>{{ $webSetting->home_banner_section_title_1 }}</td>
                <td>{{ $webSetting->home_banner_section_title_2 }}</td>
                <td>{{ $webSetting->home_banner_section_title_3 }}</td>
                <td>{{ $webSetting->home_about_section_title }}</td>
                <td>{{ $webSetting->home_about_section_short_details }}</td>
                <td>{{ $webSetting->home_about_section_long_details }}</td>
                <td>{{ $webSetting->home_room_section_title }}</td>
                <td>{{ $webSetting->home_room_section_title_sub }}</td>
                <td>{{ $webSetting->home_team_section_title_1 }}</td>
                <td>{{ $webSetting->home_team_section_title_2 }}</td>
                <td>{{ $webSetting->home_service_section_title }}</td>
                <td>{{ $webSetting->home_service_section_sub_title }}</td>
                <td>{{ $webSetting->home_video_section_title }}</td>
                <td>{{ $webSetting->home_video_section_sub_title }}</td>
                <td>{{ $webSetting->home_video_section_video_link }}</td>
                <td>{{ $webSetting->gallery_gallery_section_title_1 }}</td>
                <td>{{ $webSetting->gallery_gallery_section_title_2 }}</td>
                <td>{{ $webSetting->home_testimonial_section_title_1 }}</td>
                <td>{{ $webSetting->home_testimonial_section_title_2 }}</td>
                <td>{{ $webSetting->home_facility_section_title_1 }}</td>
                <td>{{ $webSetting->home_facility_section_title_2 }}</td>
                <td>{{ $webSetting->general_general_section_footer_content }}</td>
                <td>{{ $webSetting->general_general_section_fb_comment_script }}</td>
                <td>{{ $webSetting->blog_blog_section_title_1 }}</td>
                <td>{{ $webSetting->blog_blog_section_title_2 }}</td>
                <td>{{ $webSetting->faq_faq_section_title_1 }}</td>
                <td>{{ $webSetting->faq_faq_section_title_2 }}</td>
                <td>{{ $webSetting->contact_all_section_title_1 }}</td>
                <td>{{ $webSetting->contact_all_section_title_2 }}</td>
                <td>{{ $webSetting->contact_all_section_phone }}</td>
                <td>{{ $webSetting->contact_all_section_email_web }}</td>
                <td>{{ $webSetting->contact_all_section_address }}</td>
                <td>{{ $webSetting->contact_all_section_map }}</td>
                        <td>
                            <a href="{{ route('web-settings.show', $webSetting->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('web-settings.edit', $webSetting->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('web-settings.destroy', $webSetting->id) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="99" class="text-center text-muted py-4">No records found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-3">{{ $webSettings->links() }}</div>
@endsection