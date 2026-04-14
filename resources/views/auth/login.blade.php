<x-guest-layout>
    {{-- PERUBAHAN: Mengganti 'justify-center' dengan 'justify-start' dan menambahkan padding-top (pt-32) untuk menurunkan posisi kartu --}}
    <div class="flex min-h-screen flex-col items-center justify-start bg-green-800 p-4 pt-32">

        {{-- Kartu Login --}}
        <div class="w-full max-w-md rounded-2xl bg-green-700 bg-opacity-50 p-8 shadow-2xl backdrop-blur-lg">

            {{-- Logo dan Nama Masjid --}}
            <div class="text-center">
                <img class="mx-auto h-20 w-auto" src="{{ asset('images/logo_attijaniyah.jpg') }}" alt="Logo Masjid AT-Tijaniyah">
                <h2 class="mt-4 text-2xl font-bold text-white">Masjid AT-Tijaniyah</h2>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
                @csrf

                <!-- Input Email -->
                <div>
                    <x-input-label for="email" value="Email" class="text-white" />
                    {{-- PERUBAHAN: Memastikan input memiliki background putih dan teks hitam --}}
                    <x-text-input id="email" class="mt-1 block w-full bg-white text-gray-900" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Input Password dengan Ikon Mata -->
                <div class="mt-4">
                    <x-input-label for="password" value="Password" class="text-white" />
                    <div class="relative">
                        {{-- PERUBAHAN: Memastikan input memiliki background putih dan teks hitam --}}
                        <x-text-input id="password" class="mt-1 block w-full bg-white text-gray-900" type="password" name="password" required autocomplete="current-password" />
                        <div class="absolute inset-y-0 right-0 flex cursor-pointer items-center pr-3" onclick="togglePasswordVisibility('password', this)">
                            <svg id="eye-icon-password" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>


                <!-- Remember Me & Lupa Password -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500" name="remember">
                        <span class="ml-2 text-sm text-white">{{ __('Ingat saya') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-white underline hover:text-gray-200" href="{{ route('password.request') }}">
                            {{ __('Lupa password?') }}
                        </a>
                    @endif
                </div>

                <!-- Tombol Login -->
                <div class="flex items-center justify-end pt-4">
                    <x-primary-button class="w-full justify-center text-lg">
                        {{ __('Log In') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

        {{-- Link Kembali ke Halaman Utama --}}
        <div class="mt-6 text-center">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-x-2 text-sm text-white hover:text-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Kembali ke Halaman Utama</span>
            </a>
        </div>
    </div>

    <script>
        function togglePasswordVisibility(id, iconContainer) {
            const input = document.getElementById(id);
            const icon = iconContainer.querySelector('svg');

            if (input.type === "password") {
                input.type = "text";
                // Ganti ikon menjadi mata tercoret
                icon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7 1.274-4.057 5.064-7 9.542-7 .847 0 1.673.126 2.463.362m-7.915 1.543A.5.5 0 014.5 9.5V9A2 2 0 016.5 7h1.286a.5.5 0 01.472.334L8.286 9H9.5a.5.5 0 01.5.5v.214a.5.5 0 01-.334.471l-1.543.772a.5.5 0 01-.666-.471V10.5A.5.5 0 017.5 10h-.214a.5.5 0 01-.471-.334l-.772-1.543z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15a3 3 0 01-3-3m0 0a3 3 0 00-3 3m3-3a3 3 0 013-3m-3 3a3 3 0 003 3" />
                `;
            } else {
                input.type = "password";
                // Ganti ikon kembali menjadi mata normal
                icon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                `;
            }
        }
    </script>
</x-guest-layout>
