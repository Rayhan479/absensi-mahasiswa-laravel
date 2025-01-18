<?php

// app/Http/Controllers/AbsensiManualController.php
namespace App\Http\Controllers;

use App\Models\AbsensiManual;
use App\Models\JadwalKuliah;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class AbsensiManualController extends Controller
{
    // Menampilkan form absensi manual
    // public function create()
    // {
    //     $mahasiswa = Mahasiswa::all(); // Ambil semua kelas
    //     return view('mahasiswa.absensi-manual', compact('mahasiswa'));
    // }

    // public function create()
    // {
    //     $mahasiswa = Mahasiswa::with('user')->get(); // Mengambil data mahasiswa beserta user
    //     return view('mahasiswa.absensi-manual', compact('mahasiswa'));
    // }
    public function create()
    {
        $user = auth()->user(); // User yang login
        $mahasiswa = $user->mahasiswa; // Ambil data mahasiswa dari relasi

        return view('mahasiswa.absensi-manual', compact('user', 'mahasiswa'));
    }


    // Menyimpan absensi manual yang diajukan mahasiswa
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'status' => 'required|in:Hadir,Izin',
            'mata_kuliah' => 'required|string|max:255',
        ]);


        AbsensiManual::create([
            'user_id' => auth()->user()->id,
            'mahasiswa_id' => auth()->user()->mahasiswa->id,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'mata_kuliah' => $request->mata_kuliah,
            'approved' => false,
        ]);

        return redirect()->route('mahasiswa.absensi.manual.create')->with('success', 'Absensi berhasil diajukan, menunggu persetujuan admin.');

    }




    /**
     * Tampilkan halaman manajemen absensi.
     */
    public function index()
    {
        $mataKuliah = JadwalKuliah::pluck('mata_kuliah', );
        $absensis = AbsensiManual::with(['mahasiswa'])->get();
        return view('admin.manajemen-absensi', compact('absensis', 'mataKuliah'));
    }

    /**
     * Memberi izin absensi mahasiswa.
     */
    public function approve(Request $request, $id)
    {
        $absensi = AbsensiManual::findOrFail($id);
        $absensi->update([
            'approved' => true,
        ]);

        return redirect()->back()->with('success', 'Absensi berhasil disetujui.');
    }

    public function reject(Request $request, $id)
    {
        $absensi = AbsensiManual::findOrFail($id);
        $absensi->delete(); // Hapus absensi jika ditolak

        return redirect()->back()->with('success', 'Absensi berhasil ditolak.');
    }



    public function riwayatAbsensi(Request $request)
    {
        $user = auth()->user();

        // Ambil filter dari request
        $tanggal = $request->input('tanggal');
        $mataKuliah = $request->input('mata_kuliah');

        // Ambil data absensi mahasiswa dengan filter
        $absensi = AbsensiManual::where('mahasiswa_id', $user->mahasiswa->id)
            ->filterByDate($tanggal)
            ->filterByMataKuliah($mataKuliah)
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('mahasiswa.riwayat-absensi', compact('absensi', 'tanggal', 'mataKuliah'));
    }




}

