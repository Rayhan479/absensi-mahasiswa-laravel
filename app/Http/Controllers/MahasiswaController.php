<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|unique:mahasiswas,nim',
            'kelas' => 'required|in:A,B,C,D,E', // Validasi untuk kelas
            'jurusan' => 'required|in:Teknik Informatika,Sistem Informasi,Teknik Industri,Teknik Sipil,Arsitektur', // Validasi opsi jurusan
            'email' => 'required|email|unique:mahasiswas,email', // Validasi email
            'alamat' => 'required|string|max:500',
            'no_telepon' => 'required|string|max:15|regex:/^[0-9]+$/', // Validasi angka
        ]);

        $validatedData['email'] = $request->email ?? null;
        Mahasiswa::create($request->all());

        return redirect()->route('admin.tambah-mahasiswa')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }


    public function create()
{
    return view('admin.tambah-mahasiswa');
}



    // Menampilkan daftar mahasiswa
    public function index()
    {
        $mahasiswa = Mahasiswa::all(); // Mengambil semua data mahasiswa
        return view('admin.data-mahasiswa', compact('mahasiswa'));

    }
}
