<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kegiatan_warga', function (Blueprint $table) {
            $table->id('id_kegiatan');
            $table->string('nama_kegiatan', 50);
            $table->date('tanggal_pelaksanaan');
            $table->string('tempat_pelaksanaan', 100);
            $table->string('penanggung_jawab', 16)->index();
            $table->timestamps();

            $table->foreign('penanggung_jawab')->references('nik')->on('data_warga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan_warga');
    }
};
