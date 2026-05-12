<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->integer('gateway_id')->unsigned();
            $table->decimal('amount')->default(0.00);
            $table->decimal('usd_amo')->default(0.00);
            $table->string('trx');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('try')->default(0);
            $table->decimal('btc_amo')->default(0.00);
            $table->decimal('btc_wallet')->default(0.00);
            $table->timestamps();
            $table->foreign('gateway_id')->references('id')->on('gateways')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};