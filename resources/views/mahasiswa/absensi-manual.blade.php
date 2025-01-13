
@include('mahasiswa.layouts.app')
{{-- <form class="max-w-sm mx-auto" action="{{ route('mahasiswa.absensi.manual.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="kelas_id">Kelas</label>
        <select name="kelas_id" id="kelas_id" class="form-control" required>
            <!-- Daftar kelas yang diikuti mahasiswa -->
            @foreach($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
    </div>




    <div class="form-group">
        <label for="status">Status Absensi</label>
        <select name="status" id="status" class="form-control" required>
            <option value="Hadir">Hadir</option>
            <option value="Izin">Izin</option>
            <option value="Alfa">Alfa</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Kirim Absensi</button>
</form> --}}

{{-- <x-app-layout> --}}

<section class="bg-white ">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold  text-gray-900">Tambahkan Absensi</h2>
        <form action="{{ route('mahasiswa.absensi.manual.store') }}" method="POST">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Mahasiswa</label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  " placeholder="Type product name" required="">
                </div>
                <div class="w-full">
                    <label for="kelas_id" class="block mb-2 text-sm font-medium text-gray-900 ">Kelas</label>
                    <select id="kelas_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                        @foreach($mahasiswa as $kelasItem)
                            <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                        @endforeach
                        {{-- <option selected="">Pilih Kelas</option>
                        <option value="">Informatika A</option>
                        <option value="TV">Informatika B</option>
                        <option value="PC">Informatika C</option>
                        <option value="PC">Informatika D</option>
                        <option value="PC">Informatika E</option> --}}

                    </select>
                </div>
                {{-- <div class="w-full">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                    <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="$2999" required="">
                </div> --}}
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                      <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900">Date</label>
                      <input type="date" name="tanggal" id="tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="$2999" required=""/>
                    </div>
                </div>
                <div>
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 ">Status Absensi</label>
                    <select id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                        <option selected="">Pilih Status</option>
                        <option value="TV">Hadir</option>
                        <option value="PC">Ijin</option>
                        <option value="GA">Alfa</option>

                    </select>
                </div>

            </div>
            <button type="submit" class=" inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-cyan-600 rounded-lg focus:ring-4 focus:ring-primary-200 ">
                Tambahkan Absen
            </button>
        </form>
    </div>
</section>
{{-- </x-app-layout> --}}
