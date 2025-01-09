<?php

// app/Models/Kelas.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kelas'];

    // Relasi ke tabel absensi_manual
    public function absensiManual()
    {
        return $this->hasMany(AbsensiManual::class);
    }
}

