<?php

// app/Http/Controllers/AbsensiManualController.php
namespace App\Http\Controllers;

use App\Models\AbsensiManual;
use App\Models\Kelas;
use Illuminate\Http\Request;

class AbsensiManualController extends Controller
{
    // Menampilkan form absensi manual
    public function create()
    {
        $kelas = Kelas::all(); // Ambil semua kelas
        return view('mahasiswa.absensi-manual', compact('kelas'));
    }

    // Menyimpan absensi manual yang diajukan mahasiswa
    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'tanggal' => 'required|date',
            'status' => 'required|in:Hadir,Izin',
        ]);

        AbsensiManual::create([
            'mahasiswa_id' => auth()->user()->id, // Mengambil ID mahasiswa yang login
            'kelas_id' => $request->kelas_id,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
        ]);

        return redirect()->route('mahasiswa.dashboard')->with('success', 'Absensi berhasil diajukan.');
    }
}

