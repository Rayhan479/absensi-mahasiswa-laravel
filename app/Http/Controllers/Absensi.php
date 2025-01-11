<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Mahasiswa;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensis = Absensi::with('mahasiswa')->get();
        return view('admin.manajemen-absensi', compact('absensis'));
    }

    public function filter(Request $request)
    {
        $query = Absensi::with('mahasiswa');

        if ($request->kelas) {
            $query->where('kelas', $request->kelas);
        }

        if ($request->mata_kuliah) {
            $query->where('mata_kuliah', 'like', '%' . $request->mata_kuliah . '%');
        }

        if ($request->jadwal) {
            $query->whereDate('tanggal', $request->jadwal);
        }

        $absensis = $query->get();

        return view('admin.manajemen-absensi', compact('absensis'));
    }

    public function approve($id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->status = 'Izin';
        $absensi->save();

        return redirect()->route('admin.manajemen-absensi.index')->with('success', 'Absensi diubah menjadi Izin.');
    }

    public function delete($id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->delete();

        return redirect()->route('admin.manajemen-absensi.index')->with('success', 'Absensi berhasil dihapus.');
    }
}
