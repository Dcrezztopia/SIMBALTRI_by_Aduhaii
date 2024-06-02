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
        Schema::create('data_warga', function (Blueprint $table) {
            // $table->id('id_warga');
            $table->string('nik', 16)->primary();
            $table->string('no_kk', 16)->unique();
            // $table->primary('nik');
            $table->string('nama', 100);
            $table->string('alamat_rumah', 200);
            $table->string('RT');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('agama', 10);
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir', 25);
            $table->string('pendidikan', 25);
            $table->string('pekerjaan', 25);
            $table->enum('status_pernikahan', ['BELUM/TIDAK', 'MENIKAH', 'JANDA/DUDA']);
            $table->enum('status_penduduk', ['T', 'P', 'A']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_warga');
    }
};
