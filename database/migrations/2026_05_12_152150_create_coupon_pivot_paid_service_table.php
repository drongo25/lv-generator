<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coupon_pivot_paid_service', function (Blueprint $table) {
            $table->id();
            $table->integer('coupon_id')->unsigned();
            $table->integer('paid_service_id')->unsigned();
            $table->timestamps();
            $table->foreign('coupon_id')->references('id')->on('coupon_masters')->onDelete('cascade');
            $table->foreign('paid_service_id')->references('id')->on('paid_services')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coupon_pivot_paid_service');
    }
};