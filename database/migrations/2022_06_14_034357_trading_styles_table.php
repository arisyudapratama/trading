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
        Schema::create('trading_styles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->bigInteger('modal')->nullable();;
            $table->bigInteger('resiko_per_transaksi')->nullable();
            $table->float('resiko_per_transaksi_persentase')->nullable();
            $table->bigInteger('risk_reward_ratio')->nullable();
            $table->float('cut_los')->nullable();
            $table->bigInteger('target_profit')->nullable();
            $table->bigInteger('maksimal_pembelian')->nullable();
            $table->float('fee_broker_beli');
            $table->float('fee_broker_jual');
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
        Schema::dropIfExists('trading_styles');
    }
};
