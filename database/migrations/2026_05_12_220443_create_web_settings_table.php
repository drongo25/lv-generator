<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('web_settings', function (Blueprint $table) {
            $table->id();
            $table->text('home_banner_section_title_1')->nullable();
            $table->text('home_banner_section_title_2')->nullable();
            $table->text('home_banner_section_title_3')->nullable();
            $table->text('home_about_section_title')->nullable();
            $table->text('home_about_section_short_details')->nullable();
            $table->longText('home_about_section_long_details')->nullable();
            $table->string('home_room_section_title')->nullable();
            $table->string('home_room_section_title_sub')->nullable();
            $table->text('home_team_section_title_1')->nullable();
            $table->text('home_team_section_title_2')->nullable();
            $table->string('home_service_section_title')->nullable();
            $table->string('home_service_section_sub_title')->nullable();
            $table->string('home_video_section_title')->nullable();
            $table->string('home_video_section_sub_title')->nullable();
            $table->string('home_video_section_video_link')->nullable();
            $table->text('gallery_gallery_section_title_1')->nullable();
            $table->text('gallery_gallery_section_title_2')->nullable();
            $table->text('home_testimonial_section_title_1')->nullable();
            $table->text('home_testimonial_section_title_2')->nullable();
            $table->string('home_facility_section_title_1')->nullable();
            $table->string('home_facility_section_title_2')->nullable();
            $table->text('general_general_section_footer_content')->nullable();
            $table->longText('general_general_section_fb_comment_script')->nullable();
            $table->string('blog_blog_section_title_1')->nullable();
            $table->string('blog_blog_section_title_2')->nullable();
            $table->text('faq_faq_section_title_1')->nullable();
            $table->text('faq_faq_section_title_2')->nullable();
            $table->text('contact_all_section_title_1')->nullable();
            $table->text('contact_all_section_title_2')->nullable();
            $table->text('contact_all_section_phone')->nullable();
            $table->text('contact_all_section_email_web')->nullable();
            $table->text('contact_all_section_address')->nullable();
            $table->text('contact_all_section_map')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('web_settings');
    }
};