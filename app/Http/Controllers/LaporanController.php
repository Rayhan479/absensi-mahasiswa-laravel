<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AbsensiManual; // Model untuk tabel absensi
use App\Models\Mahasiswa;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index');
    }

    public function generate(Request $request)
{
    $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ]);

    // Ambil data absensi berdasarkan periode
    $laporan = AbsensiManual::with('mahasiswa.user') // Optimalkan dengan eager loading
        ->whereBetween('tanggal', [$request->start_date, $request->end_date])
        ->orderBy('tanggal', 'asc')
        ->get();

    return view('admin.laporan.result', compact('laporan', 'request'));
}

}

