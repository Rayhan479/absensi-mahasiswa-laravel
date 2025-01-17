<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class MahasiswaController extends Controller
{
    public function dashboard()
    {
        return view('mahasiswa.dashboard');
    }

    // public function mahasiswa()
    // {
    //     return view('admin.data-mahasiswa');
    // }



public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'nim' => 'required|string|unique:mahasiswas,nim',
        'kelas' => 'required|in:A,B,C,D,E',
        'jurusan' => 'required|in:Teknik Informatika,Sistem Informasi,Teknik Industri,Teknik Sipil,Arsitektur',
        'alamat' => 'required|string|max:500',
        'no_telepon' => 'required|string|max:15|regex:/^[0-9]+$/',
        'email' => 'required|string|email|max:255|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
    ]);

    try {
        // Simpan data ke tabel 'mahasiswas'
        $mahasiswa = Mahasiswa::create([
            'nim' => $validated['nim'],
            'kelas' => $validated['kelas'],
            'jurusan' => $validated['jurusan'],
            'alamat' => $validated['alamat'],
            'no_telepon' => $validated['no_telepon'],
            'user_id' => $request->user_id,
        ]);

        Log::info('Data mahasiswa berhasil disimpan.', ['mahasiswa' => $mahasiswa]);

        // Simpan data ke tabel 'users'
        $user = User::create([
            'name' => $validated['nama'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        Log::info('Data user berhasil disimpan.', ['user' => $user]);

        return redirect()->route('admin.data-mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');

    } catch (\Exception $e) {
        Log::error('Gagal menyimpan data.', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
    }
}


    public function create()
{
    return view('admin.tambah-mahasiswa');
}



    // Menampilkan daftar mahasiswa
    public function index()
    {
        $mahasiswa = Mahasiswa::with('user')->get(); // Mengambil data mahasiswa beserta user
        return view('admin.data-mahasiswa', compact('mahasiswa'));
    }

}
