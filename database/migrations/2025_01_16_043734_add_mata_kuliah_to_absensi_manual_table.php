<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('absensi_manual', function (Blueprint $table) {
            $table->string('mata_kuliah')->after('kelas_id'); // Tambahkan kolom setelah user_id
        });
    }

    public function down()
    {
        Schema::table('absensi_manual', function (Blueprint $table) {
            $table->dropColumn('mata_kuliah');
        });
    }

};
