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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->foreignId('id_petugas');
            $table->string('nisn')->index();
            $table->date('tgl_bayar');
            $table->foreignId('id_spp')->index();
            $table->integer('jumlah_bayar');
            $table->string('keterangan');
            
            //foreigns
            $table->foreign('id_spp')->references('id_spp')->on('siswa')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_petugas')->references('id_petugas')->on('petugas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('nisn')->references('nisn')->on('siswa')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
};
