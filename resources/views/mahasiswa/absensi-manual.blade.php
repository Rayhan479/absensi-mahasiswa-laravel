
{{-- @include('mahasiswa.layouts.app') --}}


@extends('mahasiswa.layouts.app')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <div class="container mx-auto max-w-2xl">
            <h2 class="text-2xl font-bold mb-6">Absensi Manual</h2>

            <div class="bg-white shadow-md rounded-lg p-6">
                <form action="{{ route('mahasiswa.absensi.manual.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                            <input type="text"
                                id="nama"
                                name="nama"
                                value="{{ $user->name }}"
                                readonly
                                class="block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="kelas" class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
                            <input type="text"
                                id="kelas"
                                name="kelas"
                                value="{{ $mahasiswa->kelas }}"
                                readonly
                                class="block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="jurusan" class="block text-sm font-medium text-gray-700 mb-1">Jurusan</label>
                            <input type="text"
                                id="jurusan"
                                name="jurusan"
                                value="{{ $mahasiswa->jurusan }}"
                                readonly
                                class="block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="mata_kuliah" class="block text-sm font-medium text-gray-700 mb-1">Mata Kuliah</label>
                            <input type="text"
                                id="mata_kuliah"
                                name="mata_kuliah"
                                required
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Kehadiran</label>
                            <input type="date"
                                id="tanggal"
                                name="tanggal"
                                required
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status Kehadiran</label>
                            <select id="status"
                                name="status"
                                required
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="Hadir">Hadir</option>
                                <option value="Izin">Izin</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                            Ajukan Absensi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- </x-app-layout> --}}
