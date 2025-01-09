<?php

// app/Models/AbsensiManual.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiManual extends Model
{
    use HasFactory;

    protected $fillable = [
        'mahasiswa_id',
        'kelas_id',
        'tanggal',
        'status',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}

