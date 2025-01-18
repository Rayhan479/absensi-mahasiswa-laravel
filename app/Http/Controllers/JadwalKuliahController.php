<?php

namespace App\Http\Controllers;

use App\Models\JadwalKuliah;
use Illuminate\Http\Request;

class JadwalKuliahController extends Controller
{
    // Menampilkan jadwal kuliah per minggu


    public function index()
    {
        $jadwals = JadwalKuliah::orderBy('hari')->orderBy('jam_mulai')->get();
        return view('admin.manajemen-jadwal', compact('jadwals'));
    }

    public function create()
{
    return view('admin.tambah-jadwal');
}



    public function store(Request $request)
    {
        $validated = $request->validate([
            'mata_kuliah' => 'required|string|max:255',
            'hari' => 'required|string|in:Senin,Selasa,Rabu,Kamis,Jumat',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        JadwalKuliah::create($validated);


        return redirect()->route('admin.manajemen-jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwal = JadwalKuliah::findOrFail($id);
        return view('admin.manajemen-jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mata_kuliah' => 'required|string|max:255',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'jam_mulai' => 'required|date_format:H:i:s',
            'jam_selesai' => 'required|date_format:H:i:s|after:jam_mulai',
        ]);

        $jadwal = JadwalKuliah::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->route('admin.manajemen-jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jadwal = JadwalKuliah::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('admin.manajemen-jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }



}

