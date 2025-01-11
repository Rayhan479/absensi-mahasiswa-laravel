@extends('admin.layouts.app')


<div class="container mx-auto px-4">
    <h2 class="text-2xl font-bold mb-4">Manajemen Absensi</h2>
    <table class="table-auto w-full bg-white shadow-md rounded-lg">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2">Nama Mahasiswa</th>
                <th class="px-4 py-2">Kelas</th>
                <th class="px-4 py-2">Mata Kuliah</th>
                <th class="px-4 py-2">Tanggal</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($absensis as $absensi)
                <tr>
                    <td class="border px-4 py-2">{{ $absensi->mahasiswa->nama ?? '-' }}</td>
                    <td class="border px-4 py-2">{{ $absensi->kelas }}</td>
                    <td class="border px-4 py-2">{{ $absensi->mata_kuliah }}</td>
                    <td class="border px-4 py-2">{{ $absensi->tanggal }}</td>
                    <td class="border px-4 py-2">{{ $absensi->status }}</td>
                    <td class="border px-4 py-2">
                        <form action="{{ route('admin.manajemen-absensi.beri-izin', $absensi->id) }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded">Izin</button>
                        </form>
                        <form action="{{ route('admin.manajemen-absensi.hapus', $absensi->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

