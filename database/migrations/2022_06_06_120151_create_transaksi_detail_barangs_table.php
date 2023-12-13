<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiDetailBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_detail_barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaksibarang_id')->unsigned();
            $table->integer('barang_id')->unsigned();
            $table->integer('total_item')->unsigned();
            $table->text('catatan')->nullable();
            $table->integer('total_harga')->unsigned()->nullable();
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
        Schema::dropIfExists('transaksi_detail_barangs');
    }
}