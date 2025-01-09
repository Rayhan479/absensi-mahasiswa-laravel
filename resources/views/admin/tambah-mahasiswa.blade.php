@extends('admin.layouts.app')

<aside class="w-64 bg-gray-800 text-white p-5">
    <h2 class="text-lg font-bold">Admin Dashboard</h2>

</aside>
<section class="bg-white">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">

        <h1 class="text-2xl font-bold mb-6">Tambah Mahasiswa</h1>
        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('admin.store-mahasiswa') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 font-medium mb-2">Nama Mahasiswa</label>
                    <input type="text" name="nama" id="nama" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:border-blue-500" value="{{ old('nama') }}" required>
                    @error('nama')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="nim" class="block text-gray-700 font-medium mb-2">NIM</label>
                    <input type="text" name="nim" id="nim" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:border-blue-500" value="{{ old('nim') }}" required>
                    @error('nim')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="kelas" class="block text-gray-700 font-bold mb-2">Kelas</label>
                    <select id="kelas" name="kelas" class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled selected>Pilih Kelas</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
                </div>


                <div class="mb-4">
                    <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
                    <select name="jurusan" id="jurusan"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            required>
                        <option value="">Pilih Jurusan</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Teknik Industri">Teknik Industri</option>
                        <option value="Teknik Sipil">Teknik Sipil</option>
                        <option value="Arsitektur">Arsitektur</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                           required>
                </div>

                <div class="mb-4">
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <textarea name="alamat" id="alamat"
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                              required></textarea>
                </div>

                <div class="mb-4">
                    <label for="no_telepon" class="block text-sm font-medium text-gray-700">Telepon</label>
                    <input type="text" name="no_telepon" id="no_telepon"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                           required>
                </div>


                <div class="flex justify-end">
                    <a href="{{ route('admin.tambah-mahasiswa') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg mr-4">Batal</a>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Simpan</button>
                </div>



            </form>
        </div>
    </div>
</section>







