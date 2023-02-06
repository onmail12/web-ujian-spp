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
        Schema::create('siswa', function (Blueprint $table) {
            
            $table->string('nisn')->primary();
            $table->string('nis');
            $table->string('nama');
            $table->foreignId('id_kelas')->index();
            $table->text('alamat');
            $table->string('no_telp');
            $table->foreignId('id_spp')->index();
            $table->string('keterangan');
            $table->time('created_at');
            $table->time('updated_at');
            
            //foreigns
            $table->foreign('id_spp')->references('id_spp')->on('spp')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};
