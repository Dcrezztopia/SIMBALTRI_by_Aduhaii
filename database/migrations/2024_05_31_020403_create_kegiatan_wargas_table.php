<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanWargasTable extends Migration
{
    public function up()
    {
        Schema::create('kegiatan_warga', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->date('tanggal_pelaksanaan');
            $table->string('tempat');
            $table->string('penanggung_jawab');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kegiatan_warga');
    }
}
