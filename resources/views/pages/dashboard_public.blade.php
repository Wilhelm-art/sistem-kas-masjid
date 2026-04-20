<x-guest-layout>
    {{-- SECTION HERO --}}
    <div class="relative isolate pt-24 lg:pt-32 overflow-hidden min-h-[90vh] flex items-center">
        <!-- Hero Background Cover -->
        <div class="absolute inset-0 -z-10 h-full w-full">
            <img src="{{ asset('images/hero-bg.jpg') }}" alt="Masjid AT-Tijaniyah" class="h-full w-full object-cover origin-center scale-105 animate-[pulse_30s_ease-in-out_infinite]">
            <div class="absolute inset-0 bg-gradient-to-b from-emerald-950/90 via-teal-900/80 to-slate-50"></div>
        </div>
        
        <div class="mx-auto max-w-7xl px-6 lg:px-8 relative z-10 w-full" x-data="{ shown: false }" x-intersect="shown = true">
            <div class="text-center max-w-3xl mx-auto">
                <span x-show="shown" x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" 
                      class="inline-block py-1.5 px-4 rounded-full bg-emerald-500/20 border border-emerald-400/30 text-emerald-300 text-sm font-semibold tracking-widest mb-6 backdrop-blur-sm">
                    SELAMAT DATANG DI
                </span>
                <h1 x-show="shown" x-transition:enter="transition ease-out duration-1000 delay-100" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" 
                    class="text-5xl font-extrabold tracking-tight text-white md:text-7xl mb-6 drop-shadow-2xl leading-tight">
                    Masjid<br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-teal-200 to-green-300 filter drop-shadow-lg">AT-Tijaniyah</span>
                </h1>
                <p x-show="shown" x-transition:enter="transition ease-out duration-1000 delay-300" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" 
                   class="mt-6 text-lg md:text-xl leading-relaxed text-emerald-50/90 drop-shadow-md font-light">
                    Pusat informasi, kegiatan, dan layanan untuk seluruh jamaah. Mari makmurkan rumah Allah, merajut ukhuwah Islamiyah, dan meraih jannah-Nya.
                </p>
                <div x-show="shown" x-transition:enter="transition ease-out duration-1000 delay-500" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0" 
                     class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-6">
                    <a href="#jadwal" class="shimmer block w-full sm:w-auto rounded-full bg-gradient-to-r from-emerald-600 to-teal-500 px-8 py-4 text-base font-semibold text-white shadow-xl shadow-emerald-500/30 hover:scale-105 transition-all active:scale-95">
                        Lihat Jadwal Sholat
                    </a>
                    <a href="{{ route('sejarah') }}" class="block w-full sm:w-auto rounded-full bg-white/10 backdrop-blur-md px-8 py-4 text-base font-semibold text-white hover:bg-white/20 transition-all border border-white/20 active:scale-95">
                        Sejarah Kami &rarr;
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- SECTION JADWAL SHOLAT --}}
    <div id="jadwal" class="relative -mt-24 z-20 pb-24" x-data="{ shown: false }" x-intersect.once="shown = true">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div x-show="shown" x-transition:enter="transition-all ease-out duration-1000" x-transition:enter-start="opacity-0 translate-y-16" x-transition:enter-end="opacity-100 translate-y-0" 
                 class="relative w-full max-w-5xl mx-auto bg-white/80 backdrop-blur-2xl rounded-[2.5rem] shadow-2xl ring-1 ring-slate-900/5 overflow-hidden p-8 sm:p-12 hover:bg-white/95 transition-all duration-500">
                
                <!-- Glowing Decoration inside card -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-emerald-400/10 rounded-full blur-3xl pointer-events-none"></div>

                <div class="flex flex-col lg:flex-row gap-12 items-center justify-between relative z-10">
                    {{-- Waktu Live --}}
                    <div class="text-center lg:text-left flex-shrink-0">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-bold uppercase tracking-widest mb-4">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                            Live Waktu Saat Ini
                        </div>
                        <h3 id="live-clock" class="text-6xl sm:text-7xl lg:text-8xl font-black tracking-tighter text-slate-900 font-mono drop-shadow-sm">--:--</h3>
                        <p id="live-seconds" class="text-2xl font-bold text-emerald-600 font-mono mt-1 mb-2 tracking-widest">--</p>
                        <p id="live-date" class="text-lg text-slate-500 font-medium">Menyinkronkan waktu...</p>
                    </div>

                    {{-- Data Waktu Sholat --}}
                    <div class="flex-grow w-full">
                        <div id="loading-indicator" class="text-center text-slate-400 py-10 animate-pulse font-medium">
                            Menyambungkan ke satelit jadwal sholat...
                        </div>
                        <div id="prayer-times-container" class="grid grid-cols-2 md:grid-cols-3 gap-3 sm:gap-4 hidden">
                            {{-- Placeholder akan diisi oleh JavaScript --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- SECTION LAPORAN KEUANGAN --}}
    @if (!empty($reportData))
    <div class="relative bg-slate-50 py-24 overflow-hidden">
        <div class="mx-auto max-w-7xl px-6 lg:px-8" x-data="{ shown: false }" x-intersect.half="shown = true">
            <div class="mx-auto max-w-2xl lg:text-center mb-20" x-show="shown" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0">
                <span class="inline-block py-1 px-3 rounded-full bg-emerald-100 text-emerald-700 text-xs font-bold tracking-widest uppercase mb-4">Transparansi Dana Umat</span>
                <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-5xl mb-4">
                    Laporan Keuangan
                </h2>
                <p class="text-lg text-slate-500">{{ $reportData['period'] }}</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center max-w-5xl mx-auto">
                <div x-show="shown" x-transition:enter="transition ease-out duration-700 delay-100" x-transition:enter-start="opacity-0 translate-y-12" x-transition:enter-end="opacity-100 translate-y-0" 
                     class="group bg-white p-8 sm:p-10 rounded-[2rem] shadow-lg shadow-slate-200/50 ring-1 ring-slate-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative z-10 w-16 h-16 rounded-2xl bg-emerald-50 flex items-center justify-center mx-auto mb-6 group-hover:scale-110 group-hover:bg-emerald-100 transition-all duration-500 delay-75">
                        <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wider relative z-10">Pemasukan Bulan Ini</p>
                    <p class="mt-4 text-3xl sm:text-4xl font-extrabold text-emerald-600 relative z-10 tracking-tight">
                        Rp {{ number_format($reportData['totalIncome'], 0, ',', '.') }}
                    </p>
                </div>
                
                <div x-show="shown" x-transition:enter="transition ease-out duration-700 delay-200" x-transition:enter-start="opacity-0 translate-y-12" x-transition:enter-end="opacity-100 translate-y-0" 
                     class="group bg-white p-8 sm:p-10 rounded-[2rem] shadow-lg shadow-slate-200/50 ring-1 ring-slate-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-red-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative z-10 w-16 h-16 rounded-2xl bg-red-50 flex items-center justify-center mx-auto mb-6 group-hover:scale-110 group-hover:bg-red-100 transition-all duration-500 delay-75">
                         <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                    </div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wider relative z-10">Pengeluaran Bulan Ini</p>
                    <p class="mt-4 text-3xl sm:text-4xl font-extrabold text-red-500 relative z-10 tracking-tight">
                        Rp {{ number_format($reportData['totalExpense'], 0, ',', '.') }}
                    </p>
                </div>
                
                <div x-show="shown" x-transition:enter="transition ease-out duration-700 delay-300" x-transition:enter-start="opacity-0 translate-y-12" x-transition:enter-end="opacity-100 translate-y-0" 
                     class="shimmer bg-gradient-to-br from-emerald-600 to-teal-800 p-8 sm:p-10 rounded-[2rem] shadow-xl shadow-emerald-500/20 transform hover:-translate-y-2 hover:shadow-2xl hover:shadow-emerald-500/40 transition-all duration-500 text-white relative overflow-hidden group">
                    <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                    <div class="relative z-10 w-16 h-16 rounded-2xl bg-white/20 backdrop-blur-md flex items-center justify-center mx-auto mb-6 group-hover:scale-110 group-hover:bg-white/30 transition-all duration-500 delay-75">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="text-sm font-bold text-emerald-100 uppercase tracking-wider relative z-10">Total Saldo Terkini</p>
                    <p class="mt-4 text-3xl sm:text-4xl font-black relative z-10 tracking-tight">
                        Rp {{ number_format($reportData['endingBalance'], 0, ',', '.') }}
                    </p>
                </div>
            </div>
            
            <div class="mt-14 text-center" x-show="shown" x-transition:enter="transition ease-out duration-700 delay-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                 <a href="{{ route('sedekah') }}" class="inline-flex items-center gap-2 text-sm font-bold text-emerald-600 bg-emerald-50 px-6 py-3 rounded-full hover:bg-emerald-100 hover:scale-105 transition-all">
                    Lihat Cara Sedekah <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                 </a>
            </div>
        </div>
    </div>
    @endif

    {{-- SECTION JADWAL KEGIATAN --}}
    <div class="bg-white py-24 sm:py-32 relative">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9IiNlN2U1ZTQiIGZpbGwtb3BhY2l0eT0iMC41Ii8+PC9zdmc+')] opacity-50"></div>
        <div class="relative mx-auto max-w-7xl px-6 lg:px-8" x-data="{ shown: false }" x-intersect.half="shown = true">
            <div class="mx-auto max-w-2xl lg:text-center mb-16" x-show="shown" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 translate-y-8" x-transition:enter-end="opacity-100 translate-y-0">
                <span class="inline-block py-1 px-3 rounded-full bg-slate-100 text-slate-700 text-xs font-bold tracking-widest uppercase mb-4">Agenda Masjid Terkini</span>
                <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 sm:text-5xl mb-6">
                    Jadwal Peribadatan & Kajian
                </h2>
                <p class="text-lg leading-relaxed text-slate-500">
                    Sempurnakan ibadahmu dengan senantiasa hadir dan memakmurkan berbagai kegiatan dan majelis ilmu di lingkungan Masjid AT-Tijaniyah.
                </p>
            </div>
            
            <div class="mx-auto mt-16 max-w-4xl grid gap-6">
                @forelse ($schedules as $index => $schedule)
                    <div x-show="shown" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-8 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100" style="transition-delay: {{ $index * 100 }}ms"
                         class="group flex flex-col sm:flex-row items-center gap-6 rounded-[2rem] bg-white border border-slate-100 shadow-sm p-6 sm:p-8 hover:shadow-2xl hover:border-emerald-100 hover:ring-1 hover:ring-emerald-500/20 transition-all duration-300">
                        
                        <div class="flex-shrink-0 w-24 h-24 rounded-3xl bg-emerald-50 flex flex-col items-center justify-center text-emerald-700 border border-emerald-100 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300 transform group-hover:scale-105 group-hover:shadow-lg shadow-emerald-500/30">
                            <p class="text-3xl font-black leading-none">{{ \Carbon\Carbon::parse($schedule->date)->format('d') }}</p>
                            <p class="text-xs font-bold uppercase tracking-widest mt-1">{{ \Carbon\Carbon::parse($schedule->date)->format('M') }}</p>
                        </div>
                        
                        <div class="flex-grow text-center sm:text-left w-full">
                            <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-600 mb-3 group-hover:bg-emerald-50 group-hover:text-emerald-700 transition-colors">
                                {{ $schedule->type == 'khatib_jumat' ? 'Sholat Jumat' : 'Kajian Rutin' }}
                            </span>
                            <h3 class="text-xl sm:text-2xl font-black text-slate-900 group-hover:text-emerald-700 transition-colors line-clamp-2">{{ $schedule->title }}</h3>
                            <div class="mt-3 text-slate-500 font-medium flex items-center justify-center sm:justify-start gap-2 text-sm bg-slate-50 rounded-lg py-2 px-3 inline-flex w-full sm:w-auto">
                                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                Penceramah: <span class="text-slate-700 font-bold">{{ $schedule->speaker_name }}</span>
                            </div>
                        </div>
                        
                        <div class="flex-shrink-0 text-center sm:text-right mt-4 sm:mt-0 w-full sm:w-auto border-t sm:border-t-0 sm:border-l border-slate-100 pt-4 sm:pt-0 sm:pl-6 pl-0">
                            <div class="flex flex-col items-center sm:items-end p-2">
                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1 flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    WAKTU
                                </p>
                                <p class="text-3xl font-mono font-black text-slate-800">{{ \Carbon\Carbon::parse($schedule->time)->format('H:i') }}</p>
                                <p class="text-xs text-slate-400 font-semibold mt-1">WIB</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div x-show="shown" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 scale-95" class="text-center bg-white border border-dashed border-slate-300 p-16 rounded-[3rem]">
                        <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="h-10 w-10 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        </div>
                        <p class="text-xl font-bold text-slate-900">MasyaAllah, belum ada agenda tercatat</p>
                        <p class="mt-2 text-base text-slate-500 max-w-sm mx-auto">Jadwal kegiatan peribadatan dan kajian terbaru rilis setiap awal bulan oleh panitia DKM.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>


    {{-- SCRIPT JADWAL SHOLAT MODERN --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const clockElement = document.getElementById('live-clock');
            const secondsElement = document.getElementById('live-seconds');
            const dateElement = document.getElementById('live-date');
            const prayerContainer = document.getElementById('prayer-times-container');
            const loadingIndicator = document.getElementById('loading-indicator');

            // --- Kumpulan Ikon SVG untuk Waktu Sholat ---
            const icons = {
                Fajr: `<svg class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" /></svg>`,
                Sunrise: `<svg class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" /></svg>`,
                Dhuhr: `<svg class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" /></svg>`,
                Asr: `<svg class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" /></svg>`,
                Maghrib: `<svg class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 15a4 4 0 004 4h9a4 4 0 100-8h-1" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>`,
                Isha: `<svg class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" /></svg>`
            };

            function padZero(num) { return num < 10 ? '0' + num : num; }

            function updateClock() {
                const now = new Date();
                clockElement.textContent = `${padZero(now.getHours())}:${padZero(now.getMinutes())}`;
                secondsElement.textContent = `:${padZero(now.getSeconds())}`;
                dateElement.textContent = now.toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
            }

            async function fetchPrayerTimes() {
                // Lokasi default Masjid Cimareme
                const latitude = -6.843, longitude = 107.526, method = 20; 
                const today = new Date(), dateString = `${today.getDate()}-${today.getMonth() + 1}-${today.getFullYear()}`;
                const apiUrl = `https://api.aladhan.com/v1/timings/${dateString}?latitude=${latitude}&longitude=${longitude}&method=${method}`;
                try {
                    const response = await fetch(apiUrl);
                    if (!response.ok) throw new Error('Gagal mengambil data jadwal sholat.');
                    const data = await response.json();
                    const timings = data.data.timings;
                    
                    loadingIndicator.style.display = 'none';
                    prayerContainer.classList.remove('hidden');
                    
                    displayPrayerTimes(timings);
                    highlightNextPrayer(timings);
                } catch (error) {
                    console.error('Error:', error);
                    loadingIndicator.innerHTML = '<p class="text-red-500 font-bold bg-red-50 py-3 rounded-xl border border-red-100">Menunggu Koneksi Jaringan...</p>';
                }
            }

            function displayPrayerTimes(timings) {
                const prayerMapping = { Fajr: 'Subuh', Sunrise: 'Terbit', Dhuhr: 'Dzuhur', Asr: 'Ashar', Maghrib: 'Maghrib', Isha: 'Isya' };
                prayerContainer.innerHTML = '';
                for (const key in prayerMapping) {
                    prayerContainer.innerHTML += `
                        <div class="prayer-card relative p-5 rounded-3xl bg-slate-50/80 border border-slate-100 transition-all duration-500 flex flex-col items-center justify-center overflow-hidden hover:scale-105 hover:bg-white hover:shadow-xl hover:shadow-emerald-500/10 hover:border-emerald-100 cursor-default" data-prayer="${key}">
                            <div class="text-emerald-400/80 mb-3 drop-shadow-sm transition-transform duration-500">${icons[key]}</div>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1 z-10">${prayerMapping[key]}</p>
                            <h4 class="text-2xl font-black text-slate-800 z-10 tracking-tight">${timings[key]}</h4>
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
                
                document.querySelectorAll('.prayer-card').forEach(card => card.classList.remove('active-prayer', 'bg-emerald-600', 'border-emerald-500', 'shadow-emerald-500/40', 'shadow-2xl', 'scale-110', '!text-white'));
                
                const nextPrayerCard = document.querySelector(`.prayer-card[data-prayer="${nextPrayerName}"]`);
                if (nextPrayerCard) {
                    nextPrayerCard.classList.add('active-prayer', 'bg-gradient-to-br', 'from-emerald-500', 'to-teal-600', 'border-emerald-500', 'shadow-2xl', 'shadow-emerald-500/40', 'scale-110');
                    nextPrayerCard.classList.remove('bg-slate-50/80', 'border-slate-100', 'hover:bg-white');
                    
                    nextPrayerCard.innerHTML += `<div class="absolute inset-0 bg-emerald-400 mix-blend-overlay animate-pulse opacity-50"></div>`;
                    
                    nextPrayerCard.querySelectorAll('div, p, h4').forEach(el => {
                        el.classList.remove('text-emerald-400/80', 'text-slate-400', 'text-slate-800');
                        el.classList.add('text-white', 'drop-shadow-md');
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
