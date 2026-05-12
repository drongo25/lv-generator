<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('uid');
            $table->timestamp('date');
            $table->integer('user_id')->unsigned();
            $table->integer('room_type_id')->unsigned();
            $table->integer('adults')->default(1);
            $table->integer('kids')->default(0);
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('number_of_room')->default(1);
            $table->string('status')->default('PENDING');
            $table->timestamps();
            $table->foreign('room_type_id')->references('id')->on('room_types')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};