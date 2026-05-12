<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservation_nights', function (Blueprint $table) {
            $table->id();
            $table->integer('reservation_id')->unsigned();
            $table->integer('room_id')->unsigned();
            $table->date('date');
            $table->dateTime('check_in');
            $table->dateTime('check_out');
            $table->decimal('price');
            $table->timestamps();
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservation_nights');
    }
};