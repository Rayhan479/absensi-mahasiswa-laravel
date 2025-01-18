<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiManual extends Model
{
    use HasFactory;

    protected $table = 'absensi_manual';

    protected $fillable = [
        'mahasiswa_id',
        'mata_kuliah',
        'tanggal',
        'status',
        'approved',
    ];

    /**
     * Relasi ke model Mahasiswa.
     */
    // app/Models/AbsensiManual.php
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function mahasiswas()
    {
        return $this->belongsTo(Mahasiswa::class, 'user_id');
    }



    // Scope untuk filter berdasarkan tanggal
    public function scopeFilterByDate($query, $tanggal)
    {
        if ($tanggal) {
            $query->whereDate('tanggal', $tanggal);
        }
    }

    // Scope untuk filter berdasarkan mata kuliah
    public function scopeFilterByMataKuliah($query, $mataKuliah)
    {
        if ($mataKuliah) {
            $query->where('mata_kuliah', 'like', "%$mataKuliah%");
        }
    }

}
