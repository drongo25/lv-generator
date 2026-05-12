<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('hotel_name')->nullable();
            $table->string('hotel_email')->nullable();
            $table->string('hotel_phone')->nullable();
            $table->text('hotel_address')->nullable();
            $table->string('color')->nullable();
            $table->string('cur')->nullable();
            $table->string('cur_sym')->nullable();
            $table->tinyInteger('reg')->default(1);
            $table->tinyInteger('ev')->default(1);
            $table->tinyInteger('mv')->default(1);
            $table->tinyInteger('en')->default(1);
            $table->tinyInteger('mn')->default(1);
            $table->string('sender_email')->nullable();
            $table->longText('email_message')->nullable();
            $table->longText('sms_api')->nullable();
            $table->longText('meta_key_word')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('meta_author')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};