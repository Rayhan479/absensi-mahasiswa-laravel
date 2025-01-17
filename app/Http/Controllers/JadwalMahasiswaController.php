<?php

namespace App\Http\Controllers;

use App\Models\JadwalKuliah;
use Illuminate\Http\Request;

class JadwalMahasiswaController extends Controller
{
public function index()
    {
        $jadwal = JadwalKuliah::orderBy('hari')
    ->orderBy('jam_mulai')
    ->get();

return view('mahasiswa.jadwal', compact('jadwal'));
;
    }
}
