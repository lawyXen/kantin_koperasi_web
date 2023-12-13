<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingRuangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_ruangans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('prodi');
            $table->string('nim');
            $table->string('angkatan');
            $table->string('namaruangan');
            $table->string('status')->default('PENDING');
            $table->string('jadwal');
            $table->string('keterangan');
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
        Schema::dropIfExists('booking_ruangans');
    }
}
