<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produuks', function (Blueprint $table) {
            $table->increments('produk_id');
            $table->string('nama_produk');
            $table->integer('stock');
            $table->integer('harga');
            $table->string('file_foto');
            $table->integer('id_levelproduk')->unsigned();
            $table->foreign('id_levelproduk')->references('id_levelproduk')->on('leveljenisproduks')->onDelete('cascade'); 
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
        Schema::dropIfExists('produuks');
    }
}
