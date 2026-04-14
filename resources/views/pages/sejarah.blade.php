<x-guest-layout>
    <div class="bg-white py-24 sm:py-32">
      <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-x-8 gap-y-16 sm:gap-y-24 lg:mx-0 lg:max-w-none lg:grid-cols-2">

          {{-- Kolom Teks Sejarah --}}
          <div class="lg:pr-4">
            <div class="relative text-base leading-7 text-gray-700 lg:max-w-lg">
              <p class="text-base font-semibold leading-7 text-green-700">Jejak Langkah & Perkembangan</p>
              <h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Sejarah Masjid AT-Tijaniyah</h1>

              {{-- Paragraf-paragraf yang sudah dipecah agar mudah dibaca --}}
              <div class="mt-8 max-w-xl space-y-6">
                <p>
                    Sejarah Masjid At-Tijaniyah, yang berlokasi di Jl. Cikandang RT 06/RW 07, Cimareme, Kecamatan Ngamprah, Kabupaten Bandung Barat, merupakan cerminan dari semangat gotong royong dan perkembangan dakwah setempat. Kisah ini berawal pada tahun 1970, ketika K.H. Iskandar Dzulqarnaen bersama mertuanya, Bapak Ita Udin, mendirikan sebuah mushola panggung sederhana berdinding bilik seluas 2x3 m².
                </p>
                <p>
                    Seiring berjalannya waktu, mushola tersebut berkembang pesat; sekitar tahun 1990 direnovasi menjadi satu lantai dan pada tahun 1992 diperluas menjadi dua lantai untuk kegiatan ibadah dan mengaji anak-anak. Perkembangan ini juga didukung oleh dibentuknya FORMASI (Forum Silaturahmi Remaja Masjid) pada tahun 1995, serta dijadikannya bangunan tersebut sebagai lokasi TKA/TPA dan didirikannya madrasah di sebelahnya pada tahun 2000.
                </p>
                <p>
                    Tonggak sejarah baru terjadi ketika masyarakat menerima hibah tanah dari program CSR sebuah perusahaan, yang memungkinkan dimulainya pembangunan masjid yang baru dan lebih besar. Di atas tanah inilah, pada tahun 2016, pembangunan dimulai. Sebagai bentuk penghormatan dan pengingat akan akar sejarahnya, masjid ini diberi nama Masjid At-Tijaniyah, karena pendiri awalnya, K.H. Iskandar Dzulqarnaen, merupakan seorang pengamal Tarekat At-Tijaniyah.
                </p>
              </div>
            </div>
          </div>

          {{-- Kolom Gambar --}}
          <div class="flex items-start justify-end lg:order-first">
            <img src="{{ asset('images/foto_masjid_attijaniyah.jpeg') }}" alt="Foto Masjid AT-Tijaniyah" class="w-[48rem] max-w-none rounded-xl shadow-xl ring-1 ring-gray-400/10 sm:w-[57rem]">
          </div>

        </div>
      </div>
    </div>
</x-guest-layout>
