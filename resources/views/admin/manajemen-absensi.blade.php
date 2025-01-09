@extends('admin.layouts.app')


<div class="container mx-auto px-6 py-8">
    <h1 class="text-2xl font-semibold text-gray-800">Manajemen Absensi</h1>

    <!-- Filter -->
    <div class="bg-white p-4 rounded-lg shadow-md mt-6">
        <form action="{{ route('admin.absensi.filter') }}" method="GET" class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                <select name="kelas" id="kelas" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                    <option value="">Pilih Kelas</option>
                    @foreach ($kelas as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex-1">
                <label for="mata_kuliah" class="block text-sm font-medium text-gray-700">Mata Kuliah</label>
                <select name="mata_kuliah" id="mata_kuliah" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                    <option value="">Pilih Mata Kuliah</option>
                    @foreach ($mata_kuliah as $mk)
                        <option value="{{ $mk->id }}">{{ $mk->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex-1">
                <label for="jadwal" class="block text-sm font-medium text-gray-700">Jadwal</label>
                <select name="jadwal" id="jadwal" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                    <option value="">Pilih Jadwal</option>
                    @foreach ($jadwal as $j)
                        <option value="{{ $j->id }}">{{ $j->hari }} - {{ $j->waktu }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="mt-6 w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none">
                    Filter
                </button>
            </div>
        </form>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg mt-6">
        <table class="table-auto w-full text-left text-gray-600">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Nama Mahasiswa</th>
                    <th class="px-4 py-3">NIM</th>
                    <th class="px-4 py-3">Kelas</th>
                    <th class="px-4 py-3">Mata Kuliah</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absensi as $key => $absen)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $key + 1 }}</td>
                    <td class="px-4 py-3">{{ $absen->mahasiswa->nama }}</td>
                    <td class="px-4 py-3">{{ $absen->mahasiswa->nim }}</td>
                    <td class="px-4 py-3">{{ $absen->kelas->nama_kelas }}</td>
                    <td class="px-4 py-3">{{ $absen->mata_kuliah->nama }}</td>
                    <td class="px-4 py-3">
                        @if ($absen->status == 'izin')
                        <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded">Izin</span>
                        @else
                        <span class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-200 rounded">Tidak Hadir</span>
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        <form action="{{ route('admin.absensi.update', $absen->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('PUT')
                            <button type="submit" name="status" value="izin" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                                Izin
                            </button>
                        </form>
                        <form action="{{ route('admin.absensi.destroy', $absen->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 focus:outline-none">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

