<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->date('dob');
            $table->longText('address')->nullable();
            $table->string('sex')->default('M');
            $table->string('picture')->nullable();
            $table->string('password');
            $table->string('id_type')->nullable();
            $table->string('id_number')->nullable();
            $table->string('id_card_image')->nullable();
            $table->text('remarks')->nullable();
            $table->tinyInteger('vip')->default(0);
            $table->tinyInteger('email_verified')->default(0);
            $table->string('email_verified_code')->nullable();
            $table->tinyInteger('sms_verified')->default(0);
            $table->string('sms_verified_code')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('remember_token')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};