<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_xxxxxx_create_absensi_manual_table.php
    public function up()
    {
        Schema::create('absensi_manual', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswas');  // Relasi dengan tabel mahasiswa
            $table->foreignId('kelas_id')->constrained('kelas');  // Relasi dengan tabel kelas
            $table->date('tanggal');
            $table->enum('status', ['Hadir', 'Izin']);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi_manual');
    }
};
