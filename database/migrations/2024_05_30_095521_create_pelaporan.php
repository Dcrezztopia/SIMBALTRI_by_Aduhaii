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
        Schema::create('pelaporan', function (Blueprint $table) {
            $table->id('id_pelaporan');
            $table->string('nama', 100);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('kewarganegaraan', 100);
            $table->string('alamat_rumah', 100);
            $table->string('perihal', 100);
            $table->string('isi', 500);
            $table->string('foto_bukti');
            $table->date('tanggal_dibuat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelaporan');
    }
};
