<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSantrisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santris', function (Blueprint $table) {
            $table->id();
            $table->string('no_urut');
            $table->string('nama_lengkap');
            $table->string('asal_sekolah');
            $table->string('nisn');
            $table->date('tgl_lahir');
            $table->string('alamat');
            $table->string('gol_darah');
            $table->string('jenis_kelamin');
            $table->string('no_hp');
            $table->string('hobi');
            $table->string('no_kk');
            $table->integer('anak_ke');
            $table->integer('tinggi_badan');
            $table->integer('berat_badan');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('nik_ibu');
            $table->string('nik_ayah');
            $table->string('nama_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('fc_akta');
            $table->string('fc_kk');
            $table->string('foto');
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
        Schema::dropIfExists('santris');
    }
}
