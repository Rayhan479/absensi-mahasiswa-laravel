<?php

// app/Models/Mahasiswa.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Jika tabel tidak mengikuti nama jamak default (misal: 'mahasiswas'), tambahkan:
    // protected $table = 'nama_tabel';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'nama',
        'nim',
        'email',
        'kelas',
        'jurusan',
        'alamat',
        'no_telepon',
    ];

    // Relasi dengan tabel lain (contoh jika ada)
    public function absensiManual()
    {
        return $this->hasMany(AbsensiManual::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}

