@include('mahasiswa.layouts.navigation')
@vite(['resources/css/app.css', 'resources/js/app.js'])
{{-- <div class="container">
    <h1>Profil Mahasiswa</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('mahasiswa.profil.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $mahasiswa->nama) }}" required>
        </div>

        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" value="{{ old('nim', $mahasiswa->nim) }}" required>
        </div>

        <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ old('jurusan', $mahasiswa->jurusan) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $mahasiswa->email) }}" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $mahasiswa->alamat) }}">
        </div>

        <div class="form-group">
            <label for="no_telepon">No Telepon</label>
            <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ old('no_telepon', $mahasiswa->no_telepon) }}">
        </div>

        <button type="submit" class="btn btn-primary">Perbarui Profil</button>
    </form>
</div> --}}




<div class="flex items-center justify-center p-20">
    <!-- Author: FormBold Team -->
    <!-- Learn More: https://formbold.com -->

    <div class="mx-auto w-full max-w-[550px] ">
        <div class="flex ">
            <a href="{{ url('mahasiswa/dashboard') }}" type="button" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-10 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">

                <svg class="w-3.5 h-3.5 mr-2 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
                Kembali
            </a>
        </div>

      <form action="{{ route('mahasiswa.profil.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="-mx-3 flex flex-wrap">
          <div class="w-full px-3 sm:w-1/2">
            <div class="mb-5">
              <label for="nama" class="mb-3 block text-base font-medium text-[#07074D]">Nama</label>
              <input type="text" name="nama" id="nama" value="{{ old('nama', $user->name) }}" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
            </div>
          </div>
          <div class="w-full px-3 sm:w-1/2">
            <div class="mb-5">
              <label for="nim" class="mb-3 block text-base font-medium text-[#07074D]">NIM</label>
              <input type="text" name="nim" id="nim" value="{{ old('nim', $mahasiswa->nim) }}" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
            </div>
          </div>
          <div class="w-full px-3 sm:w-1/2">
            <div class="mb-5">
              <label for="jurusan" class="mb-3 block text-base font-medium text-[#07074D]">Jurusan</label>
              <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan', $mahasiswa->jurusan) }}" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
            </div>
          </div>
          <div class="w-full px-3 sm:w-1/2">
            <div class="mb-5">
              <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">Email</label>
              <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
            </div>
          </div>
        </div>

        <div class="mb-5">
          <label for="no_telepon" class="mb-3 block text-base font-medium text-[#07074D]">No Telepon</label>
          <input type="text" name="no_telepon" id="no_telepon" value="{{ old('no_telepon', $mahasiswa->no_telepon) }}" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
        </div>

        <div class="mb-5">
          <label for="alamat" class="mb-3 block text-base font-medium text-[#07074D]">Alamat Lengkap</label>
          <textarea name="alamat" id="alamat" rows="3" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">{{ old('alamat', $mahasiswa->alamat) }}</textarea>
        </div>

        <div>
          <button type="submit" class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
            Update Profile
          </button>
        </div>
      </form>
    </div>
  </div>
