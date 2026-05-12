<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paid_services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('price_type');
            $table->decimal('price')->default(0.00);
            $table->longText('short_desc')->nullable();
            $table->longText('long_desc')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paid_services');
    }
};