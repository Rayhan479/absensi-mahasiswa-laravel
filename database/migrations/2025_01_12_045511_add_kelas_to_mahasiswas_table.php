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
    Schema::table('mahasiswas', function (Blueprint $table) {
        $table->string('kelas')->after('jurusan')->nullable(); // Tambahkan kolom 'kelas'
    });
}


    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('mahasiswas', function (Blueprint $table) {
        $table->dropColumn('kelas'); // Hapus kolom 'kelas' jika rollback
    });
}

};
