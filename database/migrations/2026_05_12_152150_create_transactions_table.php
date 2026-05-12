<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->unsigned();
            $table->integer('gateway_id')->nullable()->unsigned();
            $table->decimal('amount')->nullable();
            $table->string('remarks')->nullable();
            $table->string('trx')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->string('type')->nullable()->default('payment');
            $table->timestamps();
            $table->foreign('gateway_id')->references('id')->on('gateways')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};