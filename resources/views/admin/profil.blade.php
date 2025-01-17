@include('mahasiswa.layouts.navigation')
@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="p-4 "> <!-- Margin untuk sidebar -->
    <div class="p-4 mt-14"> <!-- Margin untuk navbar -->
        <div class="max-w-2xl mx-auto">
            <!-- Header Section -->
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">Profil Admin</h2>
                    <p class="mt-1 text-sm text-gray-600">Perbarui informasi profil dan email akun Anda</p>
                </div>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Dashboard
                </a>
            </div>
            <!-- Alert Success -->
            @if (session('success'))
            <div class="p-4 mb-6 text-sm text-green-800 rounded-lg bg-green-50 " role="alert">
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-2 fill-current" viewBox="0 0 20 20">
                        <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
            @endif

            <!-- Profile Form -->
            <div class="bg-white  shadow rounded-lg">
                <form action="{{ route('admin.profil.update') }}" method="POST" class="space-y-6 p-6">
                    @csrf
                    @method('PUT')

                    <!-- Name Input -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 ">Nama</label>
                        <div class="mt-1">
                            <input type="text" name="name" id="name"
                                value="{{ old('name', $admin->name) }}"
                                class="shadow-sm block w-full rounded-md border-gray-300  focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('name') border-red-500 @enderror">
                        </div>
                        @error('name')
                        <p class="mt-1 text-sm text-red-600 ">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 ">Email</label>
                        <div class="mt-1">
                            <input type="email" name="email" id="email"
                                value="{{ old('email', $admin->email) }}"
                                class="shadow-sm block w-full rounded-md border-gray-300  focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('email') border-red-500 @enderror">
                        </div>
                        @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 ">
                            Password Baru <span class="text-sm text-gray-500 ">(Opsional)</span>
                        </label>
                        <div class="mt-1">
                            <input type="password" name="password" id="password"
                                class="shadow-sm block w-full rounded-md border-gray-300  focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('password') border-red-500 @enderror">
                        </div>
                        @error('password')
                        <p class="mt-1 text-sm text-red-600 ">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Confirmation Input -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 ">
                            Konfirmasi Password
                        </label>
                        <div class="mt-1">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="shadow-sm block w-full rounded-md border-gray-300  focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end pt-4">
                        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 ">
                            <svg class="w-4 h-4 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

