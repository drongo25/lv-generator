<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('room_types', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('short_code');
            $table->longText('description')->nullable();
            $table->integer('base_capacity')->default(0);
            $table->integer('higher_capacity')->default(0);
            $table->tinyInteger('extra_bed')->default(0);
            $table->integer('kids_capacity')->default(0);
            $table->decimal('base_price')->default(0.00);
            $table->decimal('additional_person_price')->default(0.00);
            $table->decimal('extra_bed_price')->default(0.00);
            $table->tinyInteger('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('room_types');
    }
};