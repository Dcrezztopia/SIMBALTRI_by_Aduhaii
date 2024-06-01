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
        Schema::create('pengajuan_surat', function (Blueprint $table) {
            $table->id('id_surat');
            $table->string('nama', 100);
            $table->date('tanggal_lahir');
            $table->string('kewarganegaraan', 100);
            $table->string('pekerjaan', 25);
            $table->string('alamat_rumah', 100);
            $table->string('kepentingan', 100);
            $table->enum('perihal', ['pengantar domisili', 'pembuatan KTP', 'pengantar kematian', 'keterangan tidak mampu']);
            $table->date('tanggal_dibuat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_surat');
    }
};
