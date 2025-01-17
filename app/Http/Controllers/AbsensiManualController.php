<?php

// app/Http/Controllers/AbsensiManualController.php
namespace App\Http\Controllers;

use App\Models\AbsensiManual;
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
        ]);

        return redirect()->route('mahasiswa.absensi.manual.create')->with('success', 'Absensi berhasil diajukan.');
    }




    /**
     * Tampilkan halaman manajemen absensi.
     */
    public function index()
    {
        $absensis = AbsensiManual::with(['mahasiswa'])->get();
        return view('admin.manajemen-absensi', compact('absensis'));
    }

    /**
     * Memberi izin absensi mahasiswa.
     */
    public function beriIzin($id)
    {
        $absensi = AbsensiManual::findOrFail($id);
        $absensi->status = 'diizinkan';
        $absensi->save();

        return redirect()->route('admin.manajemen-absensi')->with('success', 'Izin absensi berhasil diberikan.');
    }

    /**
     * Hapus data absensi mahasiswa.
     */
    public function hapusAbsensi($id)
    {
        $absensi = AbsensiManual::findOrFail($id);
        $absensi->delete();

        return redirect()->route('admin.manajemen-absensi')->with('success', 'Data absensi berhasil dihapus.');
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

