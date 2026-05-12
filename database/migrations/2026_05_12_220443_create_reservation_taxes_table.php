<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservation_taxes', function (Blueprint $table) {
            $table->id();
            $table->integer('reservation_id')->unsigned();
            $table->integer('tax_id')->unsigned();
            $table->string('type');
            $table->decimal('value')->default(0.00);
            $table->decimal('price')->default(0.00);
            $table->timestamps();
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
            $table->foreign('tax_id')->references('id')->on('tax_managers')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservation_taxes');
    }
};