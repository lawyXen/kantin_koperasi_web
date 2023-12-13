<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->increments('barang_id');
            $table->string('nama_barang');
            $table->integer('stock');
            $table->integer('harga');
            $table->integer('id_levelbarang')->unsigned();
            $table->foreign('id_levelbarang')->references('id_levelbarang')->on('leveljenisbarang')->onDelete('cascade');
            $table->string('file_foto');
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
        Schema::dropIfExists('barangs');
    }
}
