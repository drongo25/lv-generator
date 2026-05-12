<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gateways', function (Blueprint $table) {
            $table->id();
            $table->string('main_name');
            $table->string('name')->nullable();
            $table->decimal('minamo')->default(0.00);
            $table->decimal('maxamo')->default(0.00);
            $table->decimal('fixed_charge')->default(0.00);
            $table->decimal('percent_charge')->default(0.00);
            $table->decimal('rate')->default(0.00);
            $table->string('val1')->nullable();
            $table->string('val2')->nullable();
            $table->string('val3')->nullable();
            $table->string('val4')->nullable();
            $table->string('val5')->nullable();
            $table->string('val6')->nullable();
            $table->string('val7')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gateways');
    }
};