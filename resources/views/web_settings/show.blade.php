@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Web Setting Details</h4>
                <a href="{{ route('web-settings.index') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
        <tr>
            <th class="w-25">{{ __('home_banner_section_title_1') }}</th>
            <td>{{ $webSetting->home_banner_section_title_1 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('home_banner_section_title_2') }}</th>
            <td>{{ $webSetting->home_banner_section_title_2 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('home_banner_section_title_3') }}</th>
            <td>{{ $webSetting->home_banner_section_title_3 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('home_about_section_title') }}</th>
            <td>{{ $webSetting->home_about_section_title }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('home_about_section_short_details') }}</th>
            <td>{{ $webSetting->home_about_section_short_details }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('home_about_section_long_details') }}</th>
            <td>{{ $webSetting->home_about_section_long_details }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('home_room_section_title') }}</th>
            <td>{{ $webSetting->home_room_section_title }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('home_room_section_title_sub') }}</th>
            <td>{{ $webSetting->home_room_section_title_sub }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('home_team_section_title_1') }}</th>
            <td>{{ $webSetting->home_team_section_title_1 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('home_team_section_title_2') }}</th>
            <td>{{ $webSetting->home_team_section_title_2 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('home_service_section_title') }}</th>
            <td>{{ $webSetting->home_service_section_title }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('home_service_section_sub_title') }}</th>
            <td>{{ $webSetting->home_service_section_sub_title }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('home_video_section_title') }}</th>
            <td>{{ $webSetting->home_video_section_title }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('home_video_section_sub_title') }}</th>
            <td>{{ $webSetting->home_video_section_sub_title }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('home_video_section_video_link') }}</th>
            <td>{{ $webSetting->home_video_section_video_link }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('gallery_gallery_section_title_1') }}</th>
            <td>{{ $webSetting->gallery_gallery_section_title_1 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('gallery_gallery_section_title_2') }}</th>
            <td>{{ $webSetting->gallery_gallery_section_title_2 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('home_testimonial_section_title_1') }}</th>
            <td>{{ $webSetting->home_testimonial_section_title_1 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('home_testimonial_section_title_2') }}</th>
            <td>{{ $webSetting->home_testimonial_section_title_2 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('home_facility_section_title_1') }}</th>
            <td>{{ $webSetting->home_facility_section_title_1 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('home_facility_section_title_2') }}</th>
            <td>{{ $webSetting->home_facility_section_title_2 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('general_general_section_footer_content') }}</th>
            <td>{{ $webSetting->general_general_section_footer_content }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('general_general_section_fb_comment_script') }}</th>
            <td>{{ $webSetting->general_general_section_fb_comment_script }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('blog_blog_section_title_1') }}</th>
            <td>{{ $webSetting->blog_blog_section_title_1 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('blog_blog_section_title_2') }}</th>
            <td>{{ $webSetting->blog_blog_section_title_2 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('faq_faq_section_title_1') }}</th>
            <td>{{ $webSetting->faq_faq_section_title_1 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('faq_faq_section_title_2') }}</th>
            <td>{{ $webSetting->faq_faq_section_title_2 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('contact_all_section_title_1') }}</th>
            <td>{{ $webSetting->contact_all_section_title_1 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('contact_all_section_title_2') }}</th>
            <td>{{ $webSetting->contact_all_section_title_2 }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('contact_all_section_phone') }}</th>
            <td>{{ $webSetting->contact_all_section_phone }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('contact_all_section_email_web') }}</th>
            <td>{{ $webSetting->contact_all_section_email_web }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('contact_all_section_address') }}</th>
            <td>{{ $webSetting->contact_all_section_address }}</td>
        </tr>
        <tr>
            <th class="w-25">{{ __('contact_all_section_map') }}</th>
            <td>{{ $webSetting->contact_all_section_map }}</td>
        </tr>
                </table>
            </div>
            <div class="card-footer d-flex gap-2">
                <a href="{{ route('web-settings.edit', $webSetting->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('web-settings.destroy', $webSetting->id) }}" method="POST"
                      onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection