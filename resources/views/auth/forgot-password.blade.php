<x-guest-layout>
    <div class="flex min-h-screen flex-col justify-center bg-gradient-to-br from-gray-100 to-green-50 py-12 sm:px-6 lg:px-8">

        {{-- Logo & Judul --}}
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
            <img class="mx-auto h-20 w-auto" src="{{ asset('images/logo_attijaniyah.jpg') }}" alt="Logo Masjid AT-Tijaniyah">
            <h2 class="mt-6 text-3xl font-extrabold text-gray-800">Lupa Password Anda?</h2>
            <p class="mt-2 text-sm text-gray-500">
                Atau kembali ke halaman
                <a href="{{ route('login') }}" class="font-semibold text-green-600 hover:text-green-700">Login</a>
            </p>
        </div>

        {{-- Card --}}
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-6 shadow-xl shadow-gray-200 ring-1 ring-gray-200 rounded-3xl sm:px-10">

                <p class="mb-6 text-sm text-gray-500 leading-relaxed">
                    Tidak masalah 😊 Cukup beritahu kami alamat email Anda dan kami akan mengirimkan link untuk mengatur ulang password baru.
                </p>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                    @csrf

                    <!-- Input Email -->
                    <div>
                        <x-input-label for="email" :value="__('Alamat Email')" />
                        <x-text-input
                            id="email"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required autofocus
                            class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-green-500 focus:ring-green-500"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Tombol Submit -->
                    <button type="submit"
                        class="w-full flex justify-center rounded-xl bg-green-600 py-3 px-4 text-sm font-semibold text-white shadow-md hover:bg-green-700 transition duration-300 ease-in-out transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Kirim Link Reset Password
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
