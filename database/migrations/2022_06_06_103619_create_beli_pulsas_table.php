<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeliPulsasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beli_pulsas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('prodi');
            $table->string('nim');
            $table->string('angkatan');
            $table->string('nohp');
            $table->string('nominal');
            $table->string('status')->default('PENDING');
            $table->string('kartu');
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
        Schema::dropIfExists('beli_pulsas');
    }
}
