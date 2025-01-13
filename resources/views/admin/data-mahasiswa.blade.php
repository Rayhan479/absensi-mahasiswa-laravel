@extends('admin.layouts.app')

    <div class="flex flex-row bg-gray-100 mt-10 min-h-screen">
        <!-- Sidebar -->


        <!-- Main Content -->
        <main class="flex-1 ml-14 p-10">
            <div class="flex justify-between items-center mb-5">
                <h1 class="text-2xl font-bold">Daftar Mahasiswa</h1>
                <a href="{{route('admin.tambah-mahasiswa')}}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Tambah Mahasiswa
                </a>
            </div>

            <!-- Table -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <table class="table-auto w-full border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-center border-b">No</th>
                            <th class="py-3 px-6 text-left border-b">Nama</th>
                            <th class="py-3 px-6 text-left border-b">NIM</th>
                            <th class="py-3 px-6 text-left border-b">Kelas</th>

                            <th class="py-3 px-6 text-left border-b">Jurusan</th>
                            <th class="py-3 px-6 text-left border-b">Email</th>
                            <th class="py-3 px-6 text-left border-b">Alamat</th>
                            <th class="py-3 px-6 text-left border-b">Telepon</th>
                            <th class="py-3 px-6 text-left border-b">Aksi</th>


                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm">
                        @foreach ($mahasiswa as $item)
        <tr class="border-b hover:bg-gray-50">
            <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ $item->user ? $item->user->name : '-' }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ $item->nim }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ $item->kelas }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ $item->jurusan }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ $item->user ? $item->user->email : '-' }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ $item->alamat }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ $item->no_telepon }}</td>
            <td class="border border-gray-300 px-4 py-2">
                <a href="#" class="text-blue-500 hover:underline">Edit</a> |
                <a href="#" class="text-red-500 hover:underline">Hapus</a>
            </td>
        </tr>
        @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="flex justify-end mt-4">
                    <a href="#" class="px-4 py-2 bg-gray-200 rounded-lg mx-1 hover:bg-gray-300">1</a>
                    <a href="#" class="px-4 py-2 bg-gray-200 rounded-lg mx-1 hover:bg-gray-300">2</a>
                    <a href="#" class="px-4 py-2 bg-gray-200 rounded-lg mx-1 hover:bg-gray-300">3</a>
                </div>
            </div>
        </main>
    </div>









