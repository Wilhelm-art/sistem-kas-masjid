<x-guest-layout>
    {{-- SECTION HERO --}}
    <div class="relative isolate pt-14 lg:pt-20 overflow-hidden">
        <div class="absolute inset-0 -z-10 h-full w-full">
            <img src="{{ asset('images/hero-bg.jpg') }}" alt="Latar Belakang Masjid AT-Tijaniyah" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-slate-900/80 via-emerald-900/60 to-slate-50"></div>
        </div>
        <div class="mx-auto max-w-7xl px-6 py-32 sm:py-48 lg:px-8 lg:py-56">
            <div class="text-center max-w-3xl mx-auto" x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)">
                <h1 class="text-5xl font-extrabold tracking-tight text-white sm:text-7xl mb-6 drop-shadow-lg"
                    x-show="show" x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0">
                    Ketenangan & Berkah di <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-200">AT-Tijaniyah</span>
                </h1>
                <p class="mt-6 text-lg leading-8 text-emerald-50 drop-shadow"
                   x-show="show" x-transition:enter="transition ease-out duration-1000 delay-300" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0">
                    Pusat informasi, kegiatan, dan layanan untuk seluruh jamaah. Bersama memakmurkan masjid, merajut ukhuwah Islamiyah.
                </p>
                <div class="mt-10 flex items-center justify-center gap-x-6"
                     x-show="show" x-transition:enter="transition ease-out duration-1000 delay-500" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0">
                    <a href="#jadwal" class="rounded-full bg-emerald-600 px-8 py-3.5 text-sm font-semibold text-white shadow-xl hover:bg-emerald-500 hover:shadow-emerald-500/40 transition-all active:scale-95">
                        Jadwal Sholat Live
                    </a>
                    <a href="{{ route('sejarah') }}" class="text-sm font-semibold leading-6 text-white hover:text-emerald-300 transition-colors flex items-center gap-2">
                        Sejarah Kami <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- SECTION JADWAL SHOLAT --}}
    <div id="jadwal" class="relative -mt-20 z-10 pb-20">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="relative w-full max-w-5xl mx-auto bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl ring-1 ring-slate-900/5 overflow-hidden p-6 sm:p-10 transform hover:-translate-y-1 transition duration-500">
                <div class="flex flex-col md:flex-row gap-10 items-center justify-between">
                    {{-- Waktu Live --}}
                    <div class="text-center md:text-left flex-shrink-0">
                        <p class="text-sm font-semibold text-emerald-600 uppercase tracking-widest mb-2">Waktu Saat Ini</p>
                        <h3 id="live-clock" class="text-5xl sm:text-7xl font-bold tracking-tight text-slate-800 font-mono">--:--:--</h3>
                        <p id="live-date" class="text-lg text-slate-500 mt-2 font-medium">Memuat tanggal...</p>
                    </div>

                    {{-- Data Waktu Sholat --}}
                    <div class="flex-grow w-full">
                        <div id="loading-indicator" class="text-center text-slate-500 py-4 animate-pulse">
                            <p>Menyambungkan ke server jadwal sholat...</p>
                        </div>
                        <div id="prayer-times-container" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">
                            {{-- Placeholder akan diisi oleh JavaScript --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- SECTION LAPORAN KEUANGAN --}}
    @if (!empty($reportData))
    <div class="bg-slate-50 pb-24 pt-10">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center mb-16">
                <h2 class="text-sm font-semibold leading-7 text-emerald-600 tracking-widest uppercase">Transparansi Dana</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                    Laporan Keuangan Masjid
                </p>
                <p class="mt-4 text-lg text-slate-600">{{ $reportData['period'] }}</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center max-w-5xl mx-auto">
                <div class="bg-white p-8 rounded-3xl shadow-sm ring-1 ring-slate-200 hover:shadow-xl hover:ring-emerald-200 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </div>
                    <p class="text-sm font-semibold text-slate-500">Pemasukan Bulan Ini</p>
                    <p class="mt-4 text-3xl font-bold text-emerald-600">
                        Rp {{ number_format($reportData['totalIncome'], 0, ',', '.') }}
                    </p>
                </div>
                
                <div class="bg-white p-8 rounded-3xl shadow-sm ring-1 ring-slate-200 hover:shadow-xl hover:ring-red-200 transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center mx-auto mb-4">
                         <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                    </div>
                    <p class="text-sm font-semibold text-slate-500">Pengeluaran Bulan Ini</p>
                    <p class="mt-4 text-3xl font-bold text-red-500">
                        Rp {{ number_format($reportData['totalExpense'], 0, ',', '.') }}
                    </p>
                </div>
                
                <div class="bg-gradient-to-br from-emerald-600 to-teal-700 p-8 rounded-3xl shadow-lg ring-1 ring-emerald-500 transform hover:-translate-y-1 transition-all duration-300 text-white relative overflow-hidden">
                    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4xIi8+PC9zdmc+')] opacity-20"></div>
                    <div class="relative z-10 w-12 h-12 rounded-full bg-white/20 flex items-center justify-center mx-auto mb-4 backdrop-blur-sm">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="text-sm font-semibold text-emerald-100">Saldo Akhir Masjid</p>
                    <p class="mt-4 text-3xl font-bold">
                        Rp {{ number_format($reportData['endingBalance'], 0, ',', '.') }}
                    </p>
                </div>
            </div>
            <div class="mt-8 text-center">
                 <a href="{{ route('sedekah') }}" class="inline-flex items-center text-sm font-semibold text-emerald-600 hover:text-emerald-500 transition">
                    Lihat Cara Sedekah &rarr;
                 </a>
            </div>
        </div>
    </div>
    @endif

    {{-- SECTION JADWAL KEGIATAN --}}
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center">
                <h2 class="text-sm font-semibold leading-7 text-emerald-600 uppercase tracking-widest">Agenda Masjid</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                    Jadwal & Kegiatan Mendatang
                </p>
                <p class="mt-6 text-lg leading-8 text-slate-600">
                    Mari hadiri berbagai majelis ilmu dan kegiatan amaliyah di Masjid AT-Tijaniyah.
                </p>
            </div>
            
            <div class="mx-auto mt-16 max-w-4xl grid gap-6">
                @forelse ($schedules as $schedule)
                    <div class="flex flex-col sm:flex-row items-center gap-6 rounded-3xl bg-slate-50 border border-slate-100 p-6 sm:p-8 hover:shadow-xl hover:bg-white transition-all duration-300 group">
                        
                        <div class="flex-shrink-0 w-24 h-24 rounded-2xl bg-emerald-100 flex flex-col items-center justify-center text-emerald-700 shadow-inner group-hover:scale-105 transition-transform">
                            <p class="text-3xl font-extrabold">{{ \Carbon\Carbon::parse($schedule->date)->format('d') }}</p>
                            <p class="text-xs font-bold uppercase tracking-wider">{{ \Carbon\Carbon::parse($schedule->date)->format('M') }}</p>
                        </div>
                        
                        <div class="flex-grow text-center sm:text-left">
                            <span class="inline-flex items-center rounded-full bg-emerald-50 px-3 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-600/20 mb-2">
                                {{ $schedule->type == 'khatib_jumat' ? 'Jumat' : 'Pengajian Rutin' }}
                            </span>
                            <h3 class="mt-1 text-xl font-bold text-slate-900 group-hover:text-emerald-700 transition">{{ $schedule->title }}</h3>
                            <div class="mt-2 text-slate-500 font-medium flex items-center justify-center sm:justify-start gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                Penceramah: {{ $schedule->speaker_name }}
                            </div>
                        </div>
                        
                        <div class="flex-shrink-0 text-center sm:text-right mt-4 sm:mt-0">
                            <div class="inline-flex flex-col items-center sm:items-end bg-emerald-50/50 rounded-xl px-5 py-3">
                                <p class="text-xs font-bold text-slate-500 uppercase tracking-widest">Waktu</p>
                                <p class="text-2xl font-mono font-bold text-slate-800">{{ \Carbon\Carbon::parse($schedule->time)->format('H:i') }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center bg-slate-50 border border-dashed border-slate-300 p-12 rounded-3xl">
                        <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="mt-4 text-base font-semibold text-slate-900">Belum ada agenda</p>
                        <p class="mt-2 text-sm text-slate-500">Jadwal kegiatan terbaru akan segera ditambahkan oleh pengurus.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>


    {{-- SCRIPT BARU UNTUK LOGIKA JADWAL SHOLAT --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const clockElement = document.getElementById('live-clock');
            const dateElement = document.getElementById('live-date');
            const prayerContainer = document.getElementById('prayer-times-container');
            const loadingIndicator = document.getElementById('loading-indicator');

            // --- Kumpulan Ikon SVG untuk Waktu Sholat ---
            const icons = {
                Fajr: `<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" /></svg>`,
                Sunrise: `<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" /></svg>`,
                Dhuhr: `<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" /></svg>`,
                Asr: `<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" /></svg>`,
                Maghrib: `<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 15a4 4 0 004 4h9a4 4 0 100-8h-1" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>`,
                Isha: `<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" /></svg>`
            };

            function padZero(num) { return num < 10 ? '0' + num : num; }

            function updateClock() {
                const now = new Date();
                clockElement.textContent = `${padZero(now.getHours())}:${padZero(now.getMinutes())}:${padZero(now.getSeconds())}`;
                dateElement.textContent = now.toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
            }

            async function fetchPrayerTimes() {
                const latitude = -6.843, longitude = 107.526, method = 20;
                const today = new Date(), dateString = `${today.getDate()}-${today.getMonth() + 1}-${today.getFullYear()}`;
                const apiUrl = `https://api.aladhan.com/v1/timings/${dateString}?latitude=${latitude}&longitude=${longitude}&method=${method}`;
                try {
                    const response = await fetch(apiUrl);
                    if (!response.ok) throw new Error('Gagal mengambil data jadwal sholat.');
                    const data = await response.json();
                    const timings = data.data.timings;
                    loadingIndicator.style.display = 'none';
                    displayPrayerTimes(timings);
                    highlightNextPrayer(timings);
                } catch (error) {
                    console.error('Error:', error);
                    loadingIndicator.innerHTML = '<p class="text-red-500">Gagal memuat jadwal sholat.</p>';
                }
            }

            function displayPrayerTimes(timings) {
                const prayerMapping = { Fajr: 'Subuh', Sunrise: 'Terbit', Dhuhr: 'Dzuhur', Asr: 'Ashar', Maghrib: 'Maghrib', Isha: 'Isya' };
                prayerContainer.innerHTML = '';
                for (const key in prayerMapping) {
                    prayerContainer.innerHTML += `
                        <div class="prayer-card p-4 rounded-2xl bg-slate-50 border border-slate-100 transition-all duration-500 flex flex-col items-center justify-center relative overflow-hidden group" data-prayer="${key}">
                            <div class="absolute inset-0 bg-emerald-600 opacity-0 group-hover:opacity-5 transition-opacity"></div>
                            <div class="text-emerald-500 mb-2 transform group-hover:scale-110 transition-transform">${icons[key]}</div>
                            <p class="text-xs font-semibold text-slate-500 uppercase tracking-widest mb-1">${prayerMapping[key]}</p>
                            <h4 class="text-xl font-bold text-slate-800">${timings[key]}</h4>
                        </div>
                    `;
                }
            }

            function highlightNextPrayer(timings) {
                const now = new Date();
                const currentTimeInMinutes = now.getHours() * 60 + now.getMinutes();
                let nextPrayerName = null, minDiff = Infinity;
                const prayerOrder = ['Fajr', 'Sunrise', 'Dhuhr', 'Asr', 'Maghrib', 'Isha'];
                for (const prayer of prayerOrder) {
                    const [h, m] = timings[prayer].split(':');
                    const prayerTimeInMinutes = parseInt(h) * 60 + parseInt(m);
                    const diff = prayerTimeInMinutes - currentTimeInMinutes;
                    if (diff > 0 && diff < minDiff) {
                        minDiff = diff;
                        nextPrayerName = prayer;
                    }
                }
                if (nextPrayerName === null) nextPrayerName = 'Fajr';
                
                document.querySelectorAll('.prayer-card').forEach(card => card.classList.remove('active-prayer', 'bg-emerald-600', 'text-white', 'border-emerald-600', 'shadow-lg', 'shadow-emerald-500/30', 'scale-105'));
                
                const nextPrayerCard = document.querySelector(`.prayer-card[data-prayer="${nextPrayerName}"]`);
                if (nextPrayerCard) {
                    nextPrayerCard.classList.add('active-prayer', 'bg-emerald-600', 'border-emerald-600', 'shadow-lg', 'shadow-emerald-500/30', 'scale-105');
                    nextPrayerCard.classList.remove('bg-slate-50', 'border-slate-100');
                    // Ganti warna text
                    nextPrayerCard.querySelectorAll('div, p, h4').forEach(el => {
                        el.classList.remove('text-emerald-500', 'text-slate-500', 'text-slate-800');
                        el.classList.add('text-white');
                    });
                }
            }

            setInterval(updateClock, 1000);
            fetchPrayerTimes();
            setInterval(fetchPrayerTimes, 60000);
            updateClock();
        });
    </script>
</x-guest-layout>

