<?php


namespace App\Http\Controllers;

use App\Models\AbsensiManual;
use App\Models\JadwalKuliah;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function dashboard()
    {
        // Menghitung jumlah mahasiswa.
        $jumlahMahasiswa = Mahasiswa::count();

        // Menghitung jumlah admin berdasarkan role.
        $jumlahAdmin = User::where('role', 'admin')->count();

        // Menghitung jumlah data absensi.
        $jumlahAbsensi = AbsensiManual::count();

        // Menghitung jumlah mata kuliah unik.
        $jumlahMataKuliah = JadwalKuliah::distinct('mata_kuliah')->count();

        return view('admin.dashboard', compact('jumlahMahasiswa', 'jumlahAdmin', 'jumlahAbsensi', 'jumlahMataKuliah'));
    }
    // Menampilkan profil admin
    public function showProfile()
    {
        $admin = Auth::user(); // Mendapatkan data admin yang sedang login
        return view('admin.profil', compact('admin'));
    }

    // Memperbarui profil admin
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $admin = Auth::user(); // Mendapatkan data admin yang sedang login
        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('admin.profil.show')->with('success', 'Profil berhasil diperbarui.');
    }

        public function approve($id)
    {
        // Cari data absensi berdasarkan ID
        $absensi = AbsensiManual::findOrFail($id);

        // Set kolom `approved` menjadi true
        $absensi->approved = true;
        $absensi->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.absensi.pending')->with('success', 'Absensi berhasil disetujui.');
    }

    public function reject($id)
    {
        // Cari data absensi berdasarkan ID
        $absensi = AbsensiManual::findOrFail($id);

        // Hapus data absensi
        $absensi->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.absensi.pending')->with('success', 'Absensi berhasil ditolak.');
    }



    public function managePendingAbsensi()
{
    $pendingAbsensi = AbsensiManual::where('approved', false)
        ->orderBy('tanggal', 'asc')
        ->get();

    return view('admin.absensi.pending', compact('pendingAbsensi'));
}



}


