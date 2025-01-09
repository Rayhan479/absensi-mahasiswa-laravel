<?php

// app/Http/Controllers/ProfilMahasiswaController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class ProfilMahasiswaController extends Controller
{
    // Menampilkan profil mahasiswa
    public function show()
    {
        $mahasiswa = auth()->user(); // Mengambil data mahasiswa yang sedang login
        return view('mahasiswa.profil', compact('mahasiswa'));
    }

    // Mengupdate profil mahasiswa
    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswas,nim,' . auth()->id(),
            'jurusan' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:mahasiswas,email,' . auth()->id(),
            'alamat' => 'nullable|string|max:255',
            'no_telepon' => 'nullable|string|max:20',
        ]);

        $mahasiswa = auth()->user();
        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.profil')->with('success', 'Profil berhasil diperbarui!');
    }

    public function showProfile($id)
    {
        // Ambil data mahasiswa berdasarkan ID
        $mahasiswa = Mahasiswa::find($id);

        // Kirim ke view
        return view('profil_mahasiswa', compact('mahasiswa'));
    }
}

