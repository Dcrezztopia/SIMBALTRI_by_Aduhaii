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

    // left_id INT,
    // right_id INT,
    // left_val INT,
    // right_val INT,
    // CONSTRAINT pk_perbandingan_left FOREIGN KEY (left_id) REFERENCES kriteria_bansos(id),
    // CONSTRAINT pk_perbandingan_right FOREIGN KEY (right_id) REFERENCES kriteria_bansos(id)
        Schema::create('perbandingan_kriteria', function (Blueprint $table) {
            $table->unsignedBigInteger('right_id');
            $table->unsignedBigInteger('left_id');
            $table->integer('right_val');
            $table->integer('left_val');
            $table->foreign('right_id')->references('id')->on('kriteria_bansos');
            $table->foreign('left_id')->references('id')->on('kriteria_bansos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perbandingan_kriteria');
    }
};
