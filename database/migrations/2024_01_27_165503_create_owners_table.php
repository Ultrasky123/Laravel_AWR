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
        Schema::create('owners', function (Blueprint $table) {
            $table->string('id_pengguna', 255)->primary();
            $table->string('nokartu', 255);
            $table->string('nama_pengguna', 255);
            $table->string('pangkat', 255);
            $table->string('NRP', 255);
            $table->string('jabatan', 255);
            $table->string('kesatuan', 255);
            $table->string('id_senjata', 255);
            $table->foreign('id_senjata')->references('id_senjata')->on('tmploadcells');
            // Dimana mau hubungin ni FK nya ?
            // $table->foreign('NRP')->references('NRP')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
