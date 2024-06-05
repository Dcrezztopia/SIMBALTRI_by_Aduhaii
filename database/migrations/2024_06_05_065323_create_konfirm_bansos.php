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
        Schema::create('konfirm_bansos', function (Blueprint $table) {
            $table->id('id_konfirmasi');
            $table->unsignedBigInteger('id_pengajuan')->index();
            $table->string('nama', 100);
            $table->string('nik', 16);
            $table->string('no_kk', 16);
            $table->timestamps();

            $table->foreign('id_pengajuan')->references('id_pBansos')->on('pengajuan_bansos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konfirm_bansos');
    }
};
