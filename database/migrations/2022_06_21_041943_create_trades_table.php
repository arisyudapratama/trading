<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('trade_id')->constrained('trading_styles');
            $table->string('kode_saham');
            $table->Integer('lot');
            $table->Integer('harga_beli');
            $table->string('tanggal_beli');
            $table->bigInteger('nominal_beli');
            $table->Integer('harga_jual')->nullable();
            $table->string('tanggal_jual')->nullable();
            $table->bigInteger('nominal_jual')->nullable();
            $table->float('gain_loss_persen')->nullable();
            $table->bigInteger('gain_loss_nominal')->nullable();
            $table->Integer('jangka_waktu')->nullable();
            $table->bigInteger('fee_beli');
            $table->bigInteger('fee_jual')->nullable();
            $table->bigInteger('net_beli');
            $table->bigInteger('net_jual')->nullable();
            $table->bigInteger('net_profit')->nullable();
            $table->Integer('fee')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trades');
    }
};
