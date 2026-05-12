<?php

namespace Database\Factories;

use App\Models\WebSetting;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebSettingFactory extends Factory
{
    protected $model = WebSetting::class;

    public function definition(): array
    {
        return [
            'home_banner_section_title_1' => fake()->sentence(),
            'home_banner_section_title_2' => fake()->sentence(),
            'home_banner_section_title_3' => fake()->sentence(),
            'home_about_section_title' => fake()->sentence(),
            'home_about_section_short_details' => fake()->paragraph(),
            'home_about_section_long_details' => fake()->paragraph(),
            'home_room_section_title' => fake()->sentence(),
            'home_room_section_title_sub' => fake()->sentence(),
            'home_team_section_title_1' => fake()->sentence(),
            'home_team_section_title_2' => fake()->sentence(),
            'home_service_section_title' => fake()->sentence(),
            'home_service_section_sub_title' => fake()->sentence(),
            'home_video_section_title' => fake()->sentence(),
            'home_video_section_sub_title' => fake()->sentence(),
            'home_video_section_video_link' => fake()->url(),
            'gallery_gallery_section_title_1' => fake()->sentence(),
            'gallery_gallery_section_title_2' => fake()->sentence(),
            'home_testimonial_section_title_1' => fake()->sentence(),
            'home_testimonial_section_title_2' => fake()->sentence(),
            'home_facility_section_title_1' => fake()->sentence(),
            'home_facility_section_title_2' => fake()->sentence(),
            'general_general_section_footer_content' => fake()->paragraph(),
            'general_general_section_fb_comment_script' => fake()->paragraph(),
            'blog_blog_section_title_1' => fake()->sentence(),
            'blog_blog_section_title_2' => fake()->sentence(),
            'faq_faq_section_title_1' => fake()->sentence(),
            'faq_faq_section_title_2' => fake()->sentence(),
            'contact_all_section_title_1' => fake()->sentence(),
            'contact_all_section_title_2' => fake()->sentence(),
            'contact_all_section_phone' => fake()->phoneNumber(),
            'contact_all_section_email_web' => fake()->unique()->safeEmail(),
            'contact_all_section_address' => fake()->address(),
            'contact_all_section_map' => fake()->paragraph(),
        ];
    }
}