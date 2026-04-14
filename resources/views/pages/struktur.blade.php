<x-guest-layout>
    {{-- Menggunakan layout yang bersih untuk halaman konten --}}
    <div class="bg-white py-16 sm:py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <h2 class="text-base font-semibold leading-7 text-green-700">Kepengurusan</h2>
                <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">
                    Struktur Organisasi DKM AT-Tijaniyah
                </p>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    Berikut adalah bagan susunan kepengurusan Dewan Kemakmuran Masjid (DKM) AT-Tijaniyah yang bertugas melayani dan memakmurkan masjid.
                </p>
            </div>

            {{-- Menampilkan gambar struktur organisasi --}}
            <div class="mt-12 flex justify-center">
                <img src="{{ asset('images/struktur-dkm.png') }}" alt="Bagan Struktur Organisasi DKM AT-Tijaniyah" class="max-w-4xl w-full h-auto rounded-lg shadow-xl">
            </div>
        </div>
    </div>
</x-guest-layout>
