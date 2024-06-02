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
        Schema::create('pengajuan_bansos', function (Blueprint $table) {
            $table->id('id_pBansos');
            $table->string('nama', 100);
            $table->string('nik', 16)->index();
            $table->string('no_kk', 16)->index();
            $table->enum('kondisi_rumah', ['SANGAT TIDAK LAYAK', 'LAYAK', 'SANGAT LAYAK']);
            $table->enum('status_pernikahan', ['BELUM/TIDAK', 'MENIKAH', 'JANDA/DUDA']);
            $table->string('pekerjaan', 25);
            $table->integer('jml_tanggungan')->length(20)->unsigned();
            $table->integer('jml_pendapatan')->length(150)->unsigned();
            $table->integer('tag_listrik')->length(10)->unsigned();
            $table->integer('tag_air')->length(10)->unsigned();
            $table->timestamps();

            $table->foreign('nik')->references('nik')->on('data_warga');
            $table->foreign('no_kk')->references('no_kk')->on('data_warga');
            // $table->foreign('status_pernikahan')->references('status_pernikahan')->on('data_warga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_bansos');
    }
};
