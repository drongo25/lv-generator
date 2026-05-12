<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservation_paid_services', function (Blueprint $table) {
            $table->id();
            $table->integer('reservation_id')->unsigned();
            $table->integer('pad_service_id')->unsigned();
            $table->string('price_type');
            $table->decimal('value')->default(0.00);
            $table->decimal('price')->default(0.00);
            $table->timestamps();
            $table->foreign('pad_service_id')->references('id')->on('paid_services')->onDelete('cascade');
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservation_paid_services');
    }
};