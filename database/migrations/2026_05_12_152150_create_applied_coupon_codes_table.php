<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applied_coupon_codes', function (Blueprint $table) {
            $table->id();
            $table->integer('reservation_id')->unsigned();
            $table->integer('coupon_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->date('date');
            $table->tinyInteger('status')->default(1);
            $table->string('coupon_type')->nullable();
            $table->decimal('coupon_rate')->default(0.00);
            $table->timestamps();
            $table->foreign('coupon_id')->references('id')->on('coupon_masters')->onDelete('cascade');
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applied_coupon_codes');
    }
};