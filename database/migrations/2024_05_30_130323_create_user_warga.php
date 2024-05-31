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
        Schema::create('user_warga', function (Blueprint $table) {
            $table->string('username')->index()->unique();
            $table->string('nik', 16)->index()->unique();
            $table->timestamps();

            $table->foreign('username')->references('username')->on('users');
            $table->foreign('nik')->references('nik')->on('data_warga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_warga');
    }
};
