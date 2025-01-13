<?php

// app/Http/Controllers/ProfilMahasiswaController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\User;

class ProfilMahasiswaController extends Controller
{
    // Menampilkan profil mahasiswa
    public function show()
    {
        $user = auth()->user(); // Mendapatkan user yang sedang login
        $mahasiswa = $user->mahasiswa; // Ambil data mahasiswa dari relasi

    // Kirimkan ke view
    return view('mahasiswa.profil', compact('user', 'mahasiswa'));
    }

    // Mengupdate profil mahasiswa
    public function update(Request $request)
{
    // Validasi input
    $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . auth()->id(),
        'nim' => 'required|string|max:20|unique:mahasiswas,nim,' . auth()->user()->mahasiswa->id,
        'kelas' => 'required|in:A,B,C,D,E',
        'jurusan' => 'required|string|max:255',
        'alamat' => 'nullable|string|max:255',
        'no_telepon' => 'nullable|string|max:20',
    ]);

    // Update data user
    $user = auth()->user(); // Mendapatkan user yang sedang login
    $user->update([
        'name' => $request->nama,
        'email' => $request->email,
    ]);

    // Update data mahasiswa
    $mahasiswa = $user->mahasiswa; // Ambil data mahasiswa dari relasi
    $mahasiswa->update([
        'nim' => $request->nim,
        'kelas' => $request->kelas,
        'jurusan' => $request->jurusan,
        'alamat' => $request->alamat,
        'no_telepon' => $request->no_telepon,
    ]);

    return redirect()->route('mahasiswa.profil')->with('success', 'Profil berhasil diperbarui!');
}





// public function showProfile()
// {
//     // Ambil data user beserta data mahasiswa terkait
//     $user = auth()->user(); // Mendapatkan user yang sedang login
//     return view('mahasiswa.profil', compact('user'));
// }


}

