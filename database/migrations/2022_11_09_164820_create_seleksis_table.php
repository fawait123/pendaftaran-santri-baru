<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeleksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seleksis', function (Blueprint $table) {
            $table->id();
            $table->integer('pendaftaran_id');
            $table->string('no_seleksi');
            $table->integer('nilai_baca_alquran');
            $table->integer('nilai_wawancara');
            $table->integer('nilai_tulis_arab');
            $table->integer('total_penilaian');
            $table->string('kamar');
            $table->text('keterangan');
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
        Schema::dropIfExists('seleksis');
    }
}
