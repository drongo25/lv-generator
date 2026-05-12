<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coupon_masters', function (Blueprint $table) {
            $table->id();
            $table->string('offer_title');
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->dateTime('period_start_time');
            $table->dateTime('period_end_time');
            $table->string('code');
            $table->string('type')->default('PERCENTAGE');
            $table->decimal('value')->default(0.00);
            $table->decimal('min_amount')->default(0.00);
            $table->decimal('max_amount')->default(0.00);
            $table->integer('limit_per_user')->default(0);
            $table->integer('limit_per_coupon')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coupon_masters');
    }
};