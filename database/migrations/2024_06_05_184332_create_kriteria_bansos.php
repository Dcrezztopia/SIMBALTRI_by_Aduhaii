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

	// id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	//    nama VARCHAR(40),
	//    jenis CHAR(7),
	//    jenis_score VARCHAR(10),
	//    weight FLOAT,
	//    table_name VARCHAR(30),
	//    column_name VARCHAR(30)
        Schema::create('kriteria_bansos', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 40);
            $table->char('jenis', 7);
            $table->string('jenis_score', 10);
            $table->double('weight')->nullable();
            $table->string('table_name', 30);
            $table->string('column_name', 30);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kriteria_bansos');
    }
};
