<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('room_type_pivot_amenity', function (Blueprint $table) {
            $table->id();
            $table->integer('room_type_id')->unsigned();
            $table->integer('amenity_id')->unsigned();
            $table->timestamps();
            $table->foreign('amenity_id')->references('id')->on('amenities')->onDelete('cascade');
            $table->foreign('room_type_id')->references('id')->on('room_types')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('room_type_pivot_amenity');
    }
};