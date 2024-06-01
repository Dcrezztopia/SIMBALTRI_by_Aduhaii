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
        Schema::create('iuran_warga', function (Blueprint $table) {
            $table->id('id_iuran');
            $table->unsignedBigInteger('id_kegiatan')->index();
            $table->date('periode');
            $table->integer('interval');
            $table->string('penanggung_jawab', 16)->index();
            $table->integer('total');
            $table->timestamps();

            $table->foreign('penanggung_jawab')->references('nik')->on('data_warga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iuran_warga');
    }
};
