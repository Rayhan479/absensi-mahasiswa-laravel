@extends('admin.layouts.app')

@section('content')
<div class="p-4 sm:ml-64 mt-14"> <!-- Menambahkan margin left untuk sidebar dan margin top untuk navbar -->
    <div class="p-4 border-2 border-gray-200 rounded-lg">
        <div class="max-w-3xl mx-auto"> <!-- Membatasi lebar maksimum form -->
            <h1 class="text-2xl font-bold mb-6">{{ isset($jadwal) ? 'Edit Jadwal' : 'Tambah Jadwal' }}</h1>


            <form action="{{ isset($jadwal) ? route('admin.manajemen-jadwal.update', $jadwal->id) : route('admin.manajemen-jadwal.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
                @csrf
                @if(isset($jadwal))
                    @method('PUT')
                @endif
                <!-- Tambahkan field form lainnya -->
                <div class="space-y-6"> <!-- Memberikan spacing yang konsisten antar field -->
                    <div>
                        <label for="mata_kuliah" class="block text-sm font-medium text-gray-700 mb-1">Mata Kuliah</label>
                        <input type="text" name="mata_kuliah" id="mata_kuliah"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            value="{{ old('mata_kuliah', $jadwal->mata_kuliah ?? '') }}" required>
                    </div>

                    <div>
                        <label for="hari" class="block text-sm font-medium text-gray-700 mb-1">Hari</label>
                        <select name="hari" id="hari"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="">Pilih Hari</option>
                            @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                                <option value="{{ $hari }}" {{ old('hari', $jadwal->hari ?? '') == $hari ? 'selected' : '' }}>
                                    {{ $hari }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="jam_mulai" class="block text-sm font-medium text-gray-700 mb-1">Jam Mulai</label>
                        <input type="time" name="jam_mulai" id="jam_mulai"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            value="{{ old('jam_mulai', $jadwal->jam_mulai ?? '') }}" required>
                    </div>

                    <div>
                        <label for="jam_selesai" class="block text-sm font-medium text-gray-700 mb-1">Jam Selesai</label>
                        <input type="time" name="jam_selesai" id="jam_selesai"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            value="{{ old('jam_selesai', $jadwal->jam_selesai ?? '') }}" required>
                    </div>

                    <div class="flex justify-end pt-4">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                            Simpan
                        </button>
                    </div>
                </div>
                {{-- <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button> --}}
            </form>




        </div>
    </div>
</div>
@endsection
