<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_barangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->string('kode_payment');
            $table->string('kode_trx');
            $table->integer('total_item')->unsigned();
            $table->bigInteger('total_harga')->unsigned();
            $table->bigInteger('total_transfer')->unsigned();
            $table->bigInteger('bank')->unsigned();
            $table->integer('kode_unik')->unsigned();
            $table->string('status')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('metode')->nullable();
            $table->timestamp('expired_at')->nullable();
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
        Schema::dropIfExists('transaksi_barangs');
    }
}