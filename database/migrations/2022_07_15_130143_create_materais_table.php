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
        Schema::create('materais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('tanggal');
            $table->Integer('lot');
            $table->bigInteger('transaksi');
            $table->float('gain_loss_persen')->nullable();;
            $table->bigInteger('gain_loss_nominal')->nullable();;
            $table->bigInteger('net_profit')->nullable();;
            $table->Integer('materai');
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
        Schema::dropIfExists('materais');
    }
};
