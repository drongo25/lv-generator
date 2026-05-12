<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('special_prices', function (Blueprint $table) {
            $table->id();
            $table->integer('room_type_id')->unsigned();
            $table->string('title');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->string('day_1');
            $table->decimal('day_1_amount')->default(0.00);
            $table->string('day_2');
            $table->decimal('day_2_amount')->default(0.00);
            $table->string('day_3');
            $table->decimal('day_3_amount')->default(0.00);
            $table->string('day_4');
            $table->decimal('day_4_amount')->default(0.00);
            $table->string('day_5');
            $table->decimal('day_5_amount')->default(0.00);
            $table->string('day_6');
            $table->decimal('day_6_amount')->default(0.00);
            $table->string('day_7');
            $table->decimal('day_7_amount')->default(0.00);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->foreign('room_type_id')->references('id')->on('room_types')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('special_prices');
    }
};