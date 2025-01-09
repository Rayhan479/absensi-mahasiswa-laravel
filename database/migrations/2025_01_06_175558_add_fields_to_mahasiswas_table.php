<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_xxxxxx_add_fields_to_mahasiswas_table.php
    public function up()
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            if (!Schema::hasColumn('mahasiswas', 'nama')) {
                $table->string('nama')->nullable();
            }
            if (!Schema::hasColumn('mahasiswas', 'nim')) {
                $table->string('nim')->nullable();
            }
            if (!Schema::hasColumn('mahasiswas', 'jurusan')) {
                $table->string('jurusan')->nullable();
            }
            if (!Schema::hasColumn('mahasiswas', 'email')) {
                $table->string('email')->nullable();
            }
            if (!Schema::hasColumn('mahasiswas', 'alamat')) {
                $table->string('alamat')->nullable();
            }
            if (!Schema::hasColumn('mahasiswas', 'no_telepon')) {
                $table->string('no_telepon')->nullable();
            }
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            //
        });
    }
};
