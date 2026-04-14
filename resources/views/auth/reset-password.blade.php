<x-guest-layout>
    {{-- Latar belakang diubah menjadi slate-100 untuk kontras yang lebih baik --}}
    <div class="flex min-h-screen flex-col justify-center bg-slate-100 py-12 sm:px-6 lg:px-8">
        {{-- Logo dan Judul --}}
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <img class="mx-auto h-16 w-auto" src="{{ asset('images/logo_attijaniyah.jpg') }}" alt="Logo Masjid AT-Tijaniyah">
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Atur Password Baru Anda</h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Pastikan Anda menggunakan password yang kuat dan mudah diingat.
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            {{-- Bayangan dipertegas dan ditambahkan border tipis untuk efek modern --}}
            <div class="bg-white py-8 px-4 shadow-2xl border border-slate-200 sm:rounded-2xl sm:px-10">

                <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Input Email -->
                    <div>
                        <x-input-label for="email" :value="__('Alamat Email')" />
                        <div class="mt-1">
                            <x-text-input id="email" class="block w-full bg-slate-100 border-slate-300" type="email" name="email" :value="old('email', $request->email)" required autofocus readonly />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Input Password Baru -->
                    <div>
                        <x-input-label for="password" :value="__('Password Baru')" />
                        <div class="mt-1 relative">
                            <x-text-input id="password" class="block w-full" type="password" name="password" required />
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                <svg class="h-6 w-6 text-gray-400 cursor-pointer" fill="none" onclick="togglePasswordVisibility('password', this)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Input Konfirmasi Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Password Baru')" />
                        <div class="mt-1 relative">
                            <x-text-input id="password_confirmation" class="block w-full" type="password" name="password_confirmation" required />
                             <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                <svg class="h-6 w-6 text-gray-400 cursor-pointer" fill="none" onclick="togglePasswordVisibility('password_confirmation', this)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>


                    <!-- Tombol Submit -->
                    <div>
                        <x-primary-button class="flex w-full justify-center">
                            {{ __('Reset Password') }}
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility(id, el) {
            const input = document.getElementById(id);
            if (input.type === "password") {
                input.type = "text";
                el.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7 1.274-4.057 5.064-7 9.542-7 .847 0 1.673.126 2.463.362m-7.915 1.543A.5.5 0 014.5 9.5V9A2 2 0 016.5 7h1.286a.5.5 0 01.472.334L8.286 9H9.5a.5.5 0 01.5.5v.214a.5.5 0 01-.334.471l-1.543.772a.5.5 0 01-.666-.471V10.5A.5.5 0 017.5 10h-.214a.5.5 0 01-.471-.334l-.772-1.543z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15a3 3 0 01-3-3m0 0a3 3 0 00-3 3m3-3a3 3 0 013-3m-3 3a3 3 0 003 3" />`;
            } else {
                input.type = "password";
                el.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
            }
        }
    </script>
</x-guest-layout>
