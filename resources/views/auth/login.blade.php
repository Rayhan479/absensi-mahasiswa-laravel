<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 to-gray-800">
        <div class="w-full max-w-md">
            <!-- Card Container -->
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl shadow-2xl p-8 border border-white/20">
                <!-- Logo/Title -->
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-white mb-2">Absensi Mahasiswa</h1>
                    <p class="text-gray-300">Sign in to your account</p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Input -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-gray-300">
                            {{ __('Email') }}
                        </label>
                        <div class="relative">
                            <input id="email" type="email" name="email" :value="old('email')" required autofocus
                                class="w-full px-4 py-3 bg-white/5 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 text-white placeholder-gray-400"
                                placeholder="Enter your email">
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-medium text-gray-300">
                            {{ __('Password') }}
                        </label>
                        <div class="relative">
                            <input id="password" type="password" name="password" required
                                class="w-full px-4 py-3 bg-white/5 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 text-white placeholder-gray-400"
                                placeholder="Enter your password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="remember"
                                class="w-4 h-4 border-gray-600 rounded focus:ring-blue-500 bg-white/5 text-blue-500">
                            <span class="text-sm text-gray-300">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                class="text-sm text-blue-400 hover:text-blue-300 transition-colors duration-200">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Login Button -->
                    <div>
                        <button type="submit"
                            class="w-full py-3 px-4 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-900 transition-all duration-200 font-medium">
                            {{ __('Sign In') }}
                        </button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</x-guest-layout>
