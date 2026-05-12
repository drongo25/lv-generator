<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebSetting extends Model
{
    use HasFactory;

    protected $table = 'web_settings';

    protected $fillable = [
        'home_banner_section_title_1',
        'home_banner_section_title_2',
        'home_banner_section_title_3',
        'home_about_section_title',
        'home_about_section_short_details',
        'home_about_section_long_details',
        'home_room_section_title',
        'home_room_section_title_sub',
        'home_team_section_title_1',
        'home_team_section_title_2',
        'home_service_section_title',
        'home_service_section_sub_title',
        'home_video_section_title',
        'home_video_section_sub_title',
        'home_video_section_video_link',
        'gallery_gallery_section_title_1',
        'gallery_gallery_section_title_2',
        'home_testimonial_section_title_1',
        'home_testimonial_section_title_2',
        'home_facility_section_title_1',
        'home_facility_section_title_2',
        'general_general_section_footer_content',
        'general_general_section_fb_comment_script',
        'blog_blog_section_title_1',
        'blog_blog_section_title_2',
        'faq_faq_section_title_1',
        'faq_faq_section_title_2',
        'contact_all_section_title_1',
        'contact_all_section_title_2',
        'contact_all_section_phone',
        'contact_all_section_email_web',
        'contact_all_section_address',
        'contact_all_section_map',
    ];

    protected $casts = [
        'id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


}