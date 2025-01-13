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
        'kelas',
        'mata_kuliah',
        'tanggal',
        'status',
    ];

    /**
     * Relasi ke model Mahasiswa.
     */
    public function mahasiswas()
    {
        return $this->belongsTo(Mahasiswa::class, 'user_id');
    }
}
