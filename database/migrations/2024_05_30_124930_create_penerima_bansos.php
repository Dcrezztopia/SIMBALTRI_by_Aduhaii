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
        Schema::create('penerima_bansos', function (Blueprint $table) {
            $table->id('id_penerima');
            $table->string('nik', 16)->index();
            $table->string('no_kk', 16)->index();
            $table->unsignedBigInteger('id_pengajuan')->index();
            $table->timestamps();

            $table->foreign('nik')->references('nik')->on('data_warga');
            $table->foreign('no_kk')->references('no_kk')->on('data_warga');
            $table->foreign('id_pengajuan')->references('id_pBansos')->on('pengajuan_bansos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerima_bansos');
    }
};
