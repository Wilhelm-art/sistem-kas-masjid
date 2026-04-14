    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Masjid AT-Tijaniyah') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Outfit', sans-serif;
                background-color: #f8fafc;
            }
            .glass-nav {
                background: rgba(255, 255, 255, 0.7);
                backdrop-filter: blur(16px);
                -webkit-backdrop-filter: blur(16px);
                border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            }
            #scrollTopBtn {
                display: none; position: fixed; bottom: 30px; right: 30px; z-index: 99;
                border: none; outline: none; background: linear-gradient(135deg, #10b981, #047857); color: white;
                cursor: pointer; padding: 14px; border-radius: 50%;
                box-shadow: 0 10px 25px rgba(5, 150, 105, 0.4);
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }
            #scrollTopBtn:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 30px rgba(5, 150, 105, 0.5);
            }
        </style>
    </head>
    <body class="antialiased text-gray-800 selection:bg-emerald-500 selection:text-white">
        <div class="bg-slate-50 min-h-screen flex flex-col">

            <!-- Floating Glass Navbar -->
            <header x-data="{ open: false, scrolled: false }" 
                    @scroll.window="scrolled = (window.pageYOffset > 20)"
                    :class="{'glass-nav shadow-sm': scrolled, 'bg-transparent': !scrolled}"
                    class="fixed inset-x-0 top-0 z-50 transition-all duration-300">
                <nav class="flex items-center justify-between p-4 lg:px-12 mx-auto max-w-screen-2xl" aria-label="Global">
                    <div class="flex items-center gap-4">
                        <a href="/" class="-m-1.5 p-1.5 flex items-center gap-3">
                            <span class="sr-only">AT-Tijaniyah</span>
                            <!-- Assuming the logo has white/transparent background, else we apply rounded-full -->
                            <img class="h-10 w-10 sm:h-12 sm:w-12 object-cover rounded-full shadow-sm ring-2 ring-emerald-500/20" src="{{ asset('images/logo_attijaniyah.jpg') }}" alt="Logo">
                            <span class="font-bold text-xl sm:text-2xl text-slate-800 tracking-tight hidden sm:block">AT-Tijaniyah</span>
                        </a>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="flex lg:hidden">
                        <button @click="open = ! open" type="button" class="inline-flex items-center justify-center rounded-lg p-2.5 text-slate-700 hover:bg-slate-100 transition-colors">
                            <span class="sr-only">Buka menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                    </div>

                    <!-- Desktop Menu -->
                    <div class="hidden lg:flex lg:gap-x-8 items-center bg-white/50 px-6 py-2 rounded-full border border-white/20 shadow-sm backdrop-blur-md">
                        <a href="{{ route('home') }}" class="text-sm font-semibold text-slate-700 hover:text-emerald-600 transition-colors">Beranda</a>
                        
                        <div class="relative group" x-data="{ dropdownOpen: false }" @mouseleave="dropdownOpen = false">
                            <button @mouseenter="dropdownOpen = true" class="flex items-center gap-x-1 text-sm font-semibold text-slate-700 hover:text-emerald-600 transition-colors py-2">
                                <span>Profil</span>
                                <svg class="h-4 w-4 flex-none text-slate-400 transition-transform duration-200" :class="{'rotate-180': dropdownOpen}" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <!-- Dropdown -->
                            <div x-show="dropdownOpen" x-transition.opacity.duration.200ms
                                 class="absolute left-1/2 -ml-28 top-full z-10 w-56 pt-2">
                                <div class="rounded-2xl bg-white/90 backdrop-blur-xl p-2 shadow-xl ring-1 ring-black/5">
                                    <a href="{{ route('sejarah') }}" class="block rounded-xl px-4 py-3 text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 transition">Sejarah Masjid</a>
                                    <a href="{{ route('visimisi') }}" class="block rounded-xl px-4 py-3 text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 transition">Visi & Misi</a>
                                    <a href="{{ route('struktur') }}" class="block rounded-xl px-4 py-3 text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 transition">Struktur DKM</a>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('sedekah') }}" class="text-sm font-semibold text-slate-700 hover:text-emerald-600 transition-colors">Sedekah & Infak</a>
                    </div>

                    <!-- Desktop Actions -->
                    <div class="hidden lg:flex lg:justify-end lg:items-center gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-slate-700 hover:text-emerald-600">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="rounded-full bg-slate-900 px-5 py-2.5 text-sm font-semibold text-white shadow hover:bg-slate-800 transition-transform active:scale-95">
                                    Logout
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-700 hover:text-emerald-600">Masuk</a>
                            <a href="{{ route('register') }}" class="rounded-full bg-emerald-600 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-emerald-500/30 hover:bg-emerald-500 hover:shadow-emerald-500/40 transition-all active:scale-95">
                                Daftar
                            </a>
                        @endauth
                    </div>
                </nav>

                <!-- Mobile Menu -->
                <div x-show="open" x-transition.opacity.duration.300ms class="lg:hidden" role="dialog" aria-modal="true" style="display: none;">
                    <div class="fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-sm" @click="open = false"></div>
                    <div class="fixed inset-y-0 right-0 z-50 w-full max-w-sm overflow-y-auto bg-white shadow-2xl p-6 sm:ring-1 sm:ring-slate-900/10 transform transition-transform duration-300">
                        <div class="flex items-center justify-between mb-8">
                            <a href="/" class="-m-1.5 p-1.5 flex items-center gap-3">
                                <img class="h-10 w-10 object-cover rounded-full shadow-sm" src="{{ asset('images/logo_attijaniyah.jpg') }}" alt="Logo">
                                <span class="font-bold text-xl text-slate-800">AT-Tijaniyah</span>
                            </a>
                            <button @click="open = false" type="button" class="-m-2.5 rounded-lg p-2.5 text-slate-700 bg-slate-100 hover:bg-slate-200 transition">
                                <span class="sr-only">Tutup menu</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="mt-6 flow-root">
                            <div class="-my-6 divide-y divide-slate-100">
                                <div class="space-y-1 py-6">
                                    <a href="{{ route('home') }}" class="-mx-3 block rounded-xl px-4 py-3 text-base font-medium text-slate-900 hover:bg-emerald-50 hover:text-emerald-600">Beranda</a>
                                    <a href="{{ route('sejarah') }}" class="-mx-3 block rounded-xl px-4 py-3 text-base font-medium text-slate-900 hover:bg-emerald-50 hover:text-emerald-600">Sejarah Masjid</a>
                                    <a href="{{ route('visimisi') }}" class="-mx-3 block rounded-xl px-4 py-3 text-base font-medium text-slate-900 hover:bg-emerald-50 hover:text-emerald-600">Visi & Misi</a>
                                    <a href="{{ route('struktur') }}" class="-mx-3 block rounded-xl px-4 py-3 text-base font-medium text-slate-900 hover:bg-emerald-50 hover:text-emerald-600">Struktur DKM</a>
                                    <a href="{{ route('sedekah') }}" class="-mx-3 block rounded-xl px-4 py-3 text-base font-medium text-slate-900 hover:bg-emerald-50 hover:text-emerald-600">Sedekah & Infak</a>
                                </div>
                                <div class="py-6 space-y-3">
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="block text-center rounded-xl bg-slate-100 px-3 py-3 text-base font-medium text-slate-900 hover:bg-slate-200">Dashboard</a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="w-full text-center rounded-xl bg-emerald-600 px-3 py-3 text-base font-medium text-white shadow-sm hover:bg-emerald-500">
                                                Logout
                                            </button>
                                        </form>
                                    @else
                                        <a href="{{ route('login') }}" class="block text-center rounded-xl bg-slate-100 px-3 py-3 text-base font-medium text-slate-900 hover:bg-slate-200">Masuk</a>
                                        <a href="{{ route('register') }}" class="block text-center rounded-xl bg-emerald-600 px-3 py-3 text-base font-medium text-white shadow-sm hover:bg-emerald-500">Daftar Akun</a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-grow pt-20">
                {{ $slot }}
            </main>

            <!-- Modern Footer -->
            <footer class="bg-slate-900 text-slate-300 relative border-t border-slate-800 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden pointer-events-none">
                    <!-- Subtle bg glowing effect -->
                    <div class="absolute -top-1/2 -right-1/4 w-[1000px] h-[1000px] rounded-full bg-emerald-900/20 blur-3xl opacity-50"></div>
                </div>

                <div class="relative mx-auto max-w-7xl px-6 py-16 sm:py-24 lg:px-8">
                    <div class="xl:grid xl:grid-cols-3 xl:gap-12">
                        <!-- Left Col: Logo & Info -->
                        <div class="space-y-8">
                            <a href="/" class="flex items-center gap-3">
                                <img class="h-14 w-14 object-cover rounded-full ring-2 ring-emerald-500/50" src="{{ asset('images/logo_attijaniyah.jpg') }}" alt="Logo Masjid AT-Tijaniyah">
                                <span class="text-2xl font-bold tracking-tight text-white">AT-Tijaniyah</span>
                            </a>
                            <p class="text-base leading-relaxed text-slate-400 max-w-xs">
                                Pusat peradaban, informasi, dan layanan digital Masjid AT-Tijaniyah untuk seluruh umat.
                            </p>
                            <div class="text-sm leading-6">
                                <div class="flex items-start gap-3 text-slate-400">
                                    <svg class="w-6 h-6 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                                    <p>Jl. Cikandang, Cimareme, Kec. Ngamprah, Kab. Bandung Barat, Jawa Barat 40552</p>
                                </div>
                            </div>
                        </div>

                        <!-- Right Cols: Links & Map -->
                        <div class="mt-16 grid grid-cols-1 gap-8 sm:grid-cols-2 xl:col-span-2 xl:mt-0">
                            <div class="md:grid md:grid-cols-2 md:gap-8">
                                <div>
                                    <h3 class="text-sm font-semibold leading-6 text-white uppercase tracking-wider">Akses Cepat</h3>
                                    <ul role="list" class="mt-6 space-y-4">
                                        <li><a href="{{ route('home') }}" class="text-sm leading-6 text-slate-400 hover:text-emerald-400 transition-colors">Beranda</a></li>
                                        <li><a href="{{ route('sedekah') }}" class="text-sm leading-6 text-slate-400 hover:text-emerald-400 transition-colors">Sedekah & Infak</a></li>
                                        <li><a href="/login" class="text-sm leading-6 text-slate-400 hover:text-emerald-400 transition-colors">Login Pengurus</a></li>
                                    </ul>
                                </div>
                                <div class="mt-10 md:mt-0">
                                    <h3 class="text-sm font-semibold leading-6 text-white uppercase tracking-wider">Tentang Kami</h3>
                                    <ul role="list" class="mt-6 space-y-4">
                                        <li><a href="{{ route('sejarah') }}" class="text-sm leading-6 text-slate-400 hover:text-emerald-400 transition-colors">Sejarah</a></li>
                                        <li><a href="{{ route('visimisi') }}" class="text-sm leading-6 text-slate-400 hover:text-emerald-400 transition-colors">Visi Misi</a></li>
                                        <li><a href="{{ route('struktur') }}" class="text-sm leading-6 text-slate-400 hover:text-emerald-400 transition-colors">Struktur DKM</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-10 sm:mt-0">
                                <h3 class="text-sm font-semibold leading-6 text-white uppercase tracking-wider mb-6">Lokasi Masjid</h3>
                                <div class="rounded-2xl overflow-hidden ring-1 ring-white/10 shadow-lg bg-slate-800/50 p-1">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.1657770839206!2d107.49915017419208!3d-6.870730367223361!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e4c00b28fdd3%3A0xe0fb0456c886c74f!2sMasjid%20At%20Tijaniyyah!5e0!3m2!1sid!2sid!4v1758162751747!5m2!1sid!2sid" 
                                            class="w-full h-48 rounded-xl opacity-90 hover:opacity-100 transition-opacity" 
                                            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-16 border-t border-slate-800/80 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                        <p class="text-xs leading-5 text-slate-500">&copy; {{ date('Y') }} Masjid AT-Tijaniyah. All rights reserved.</p>
                        <div class="flex gap-4">
                            <!-- Social icons placeholders -->
                            <a href="#" class="text-slate-500 hover:text-emerald-400 transition-colors">
                                <span class="sr-only">Facebook</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                            </a>
                            <a href="#" class="text-slate-500 hover:text-emerald-400 transition-colors">
                                <span class="sr-only">Instagram</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <button onclick="scrollToTop()" id="scrollTopBtn" title="Kembali ke atas">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
            </svg>
        </button>

        <script>
            const scrollTopBtn = document.getElementById("scrollTopBtn");
            window.onscroll = function() { scrollFunction() };
            function scrollFunction() {
                if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                    scrollTopBtn.style.display = "block";
                    setTimeout(() => { scrollTopBtn.style.opacity = "1"; scrollTopBtn.style.transform = "translateY(0)"; }, 10);
                } else {
                    scrollTopBtn.style.opacity = "0";
                    scrollTopBtn.style.transform = "translateY(10px)";
                    setTimeout(() => { scrollTopBtn.style.display = "none"; }, 300);
                }
            }
            function scrollToTop() {
                window.scrollTo({top: 0, behavior: 'smooth'});
            }
        </script>

    </body>
    </html>
