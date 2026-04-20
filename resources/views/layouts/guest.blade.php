<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Masjid AT-Tijaniyah') }}</title>

    <!-- Google Fonts: Outfit for modern look -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Alpine.js & Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #f8fafc;
        }

        /* Modern Glass Navigation Box */
        .glass-nav-scrolled {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
        }

        /* Scroll Top Button */
        #scrollTopBtn {
            opacity: 0; pointer-events: none; position: fixed; bottom: 30px; right: 30px; z-index: 99;
            border: none; outline: none; background: linear-gradient(135deg, #10b981, #047857); color: white;
            cursor: pointer; padding: 14px; border-radius: 50%;
            box-shadow: 0 10px 25px rgba(5, 150, 105, 0.4);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateY(20px) scale(0.9);
        }
        #scrollTopBtn.show {
            opacity: 1; pointer-events: auto; transform: translateY(0) scale(1);
        }
        #scrollTopBtn:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 15px 30px rgba(5, 150, 105, 0.6);
        }

        /* Custom Keyframes */
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
        
        .shimmer {
            position: relative;
            overflow: hidden;
        }
        .shimmer::before {
            content: '';
            position: absolute;
            top: 0; left: -100%; width: 50%; height: 100%;
            background: linear-gradient(to right, transparent, rgba(255,255,255,0.4), transparent);
            transform: skewX(-20deg);
            transition: all 0.7s;
        }
        .shimmer:hover::before {
            left: 200%;
        }
        /* Custom scrollbar to match sleek theme */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9; 
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1; 
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #10b981; 
        }
    </style>
</head>
<body class="antialiased text-slate-800 selection:bg-emerald-500 selection:text-white">
    <div class="bg-slate-50 min-h-screen flex flex-col relative overflow-hidden">

        <!-- Global Background Orbs for Premium Atmosphere -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none z-0">
            <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-emerald-200 rounded-full mix-blend-multiply filter blur-[100px] opacity-40 animate-blob"></div>
            <div class="absolute top-[20%] right-[-5%] w-96 h-96 bg-teal-200 rounded-full mix-blend-multiply filter blur-[100px] opacity-40 animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-[-10%] left-[20%] w-96 h-96 bg-green-200 rounded-full mix-blend-multiply filter blur-[100px] opacity-40 animate-blob animation-delay-4000"></div>
        </div>

        <!-- Floating Glass Navbar -->
        <header x-data="{ open: false, scrolled: false }" 
                @scroll.window="scrolled = (window.pageYOffset > 20)"
                class="fixed inset-x-0 top-0 z-50 transition-all duration-500 pt-4 px-4 sm:px-6 lg:px-8">
            <nav :class="scrolled ? 'glass-nav-scrolled py-2' : 'bg-white/60 backdrop-blur-md py-3'" 
                 class="flex items-center justify-between mx-auto max-w-7xl rounded-full px-6 transition-all duration-500 border border-white/40 shadow-sm" aria-label="Global">
                <div class="flex items-center gap-4">
                    <a href="/" class="-m-1.5 p-1.5 flex items-center gap-3 group">
                        <span class="sr-only">AT-Tijaniyah</span>
                        <div class="p-0.5 bg-white rounded-full shadow-md group-hover:shadow-emerald-500/30 transition-all duration-300">
                            <img class="h-10 w-10 sm:h-11 sm:w-11 object-cover rounded-full" src="{{ asset('images/logo_attijaniyah.jpg') }}" alt="Logo">
                        </div>
                        <span class="font-extrabold text-xl sm:text-2xl text-slate-800 tracking-tight hidden sm:block bg-clip-text group-hover:text-emerald-700 transition-colors">AT-Tijaniyah</span>
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex xl:hidden">
                    <button @click="open = ! open" type="button" class="inline-flex items-center justify-center rounded-full p-2.5 text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 transition-colors focus:ring-2 focus:ring-emerald-500/50 outline-none">
                        <span class="sr-only">Buka menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden xl:flex xl:gap-x-1 items-center">
                    <a href="{{ route('home') }}" class="px-4 py-2 rounded-full text-sm font-semibold text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 transition-all duration-200">Beranda</a>
                    
                    <div class="relative group" x-data="{ dropdownOpen: false }" @mouseleave="dropdownOpen = false">
                        <button @mouseenter="dropdownOpen = true" class="px-4 py-2 rounded-full flex items-center gap-x-1 text-sm font-semibold text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 transition-all duration-200">
                            <span>Profil</span>
                            <svg class="h-4 w-4 flex-none text-emerald-500 transition-transform duration-300" :class="{'rotate-180': dropdownOpen}" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0L5.23 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- Dropdown Glass -->
                        <div x-show="dropdownOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0 scale-100" x-transition:leave-end="opacity-0 translate-y-2 scale-95" class="absolute left-1/2 -translate-x-1/2 top-[calc(100%+0.5rem)] z-10 w-56">
                            <div class="rounded-2xl bg-white/95 backdrop-blur-xl p-2 shadow-2xl ring-1 ring-slate-900/5">
                                <a href="{{ route('sejarah') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 transition-colors">
                                    <div class="w-8 h-8 rounded-lg bg-emerald-100 flex items-center justify-center text-emerald-600"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg></div>
                                    Sejarah Masjid
                                </a>
                                <a href="{{ route('visimisi') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 transition-colors">
                                    <div class="w-8 h-8 rounded-lg bg-emerald-100 flex items-center justify-center text-emerald-600"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"/></svg></div>
                                    Visi & Misi
                                </a>
                                <a href="{{ route('struktur') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 transition-colors">
                                    <div class="w-8 h-8 rounded-lg bg-emerald-100 flex items-center justify-center text-emerald-600"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg></div>
                                    Struktur DKM
                                </a>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('sedekah') }}" class="px-4 py-2 rounded-full text-sm font-semibold text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 transition-all duration-200">Sedekah & Infak</a>
                </div>

                <!-- Desktop Actions -->
                <div class="hidden xl:flex xl:items-center gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-slate-700 hover:text-emerald-700 px-3">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="rounded-full bg-slate-900 border border-slate-700 px-6 py-2.5 text-sm font-semibold text-white shadow-md hover:bg-slate-800 hover:shadow-lg hover:-translate-y-0.5 transition-all active:scale-95">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-700 hover:text-emerald-700 px-3 transition-colors">Masuk</a>
                        <a href="{{ route('register') }}" class="shimmer rounded-full bg-gradient-to-r from-emerald-600 to-teal-500 border border-emerald-400/50 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-emerald-500/30 hover:shadow-emerald-500/50 hover:scale-105 transition-all active:scale-95">
                            Daftar Akun
                        </a>
                    @endauth
                </div>
            </nav>

            <!-- Mobile Menu Dialog (Glass Pane) -->
            <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="xl:hidden" role="dialog" aria-modal="true" style="display: none;">
                <div class="fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-md" @click="open = false"></div>
                <!-- Sliding Panel -->
                <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" class="fixed inset-y-0 right-0 z-50 w-full max-w-sm overflow-y-auto bg-white/95 backdrop-blur-2xl shadow-2xl p-6 sm:ring-1 sm:ring-slate-900/10">
                    <div class="flex items-center justify-between mb-8 pb-4 border-b border-slate-100">
                        <a href="/" class="-m-1.5 p-1.5 flex items-center gap-3">
                            <img class="h-10 w-10 object-cover rounded-full shadow-sm ring-2 ring-emerald-500/20" src="{{ asset('images/logo_attijaniyah.jpg') }}" alt="Logo">
                            <span class="font-extrabold text-xl text-slate-800 bg-clip-text text-transparent bg-gradient-to-r from-emerald-600 to-teal-500">AT-Tijaniyah</span>
                        </a>
                        <button @click="open = false" type="button" class="-m-2.5 rounded-full p-2.5 text-slate-500 bg-slate-50 hover:bg-slate-200 transition-colors">
                            <span class="sr-only">Tutup menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-slate-100">
                            <div class="space-y-2 py-6">
                                <a href="{{ route('home') }}" class="group flex items-center gap-3 rounded-2xl px-4 py-3 text-base font-semibold text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 transition-all">
                                    <div class="w-8 h-8 rounded-lg bg-emerald-100/50 flex items-center justify-center text-emerald-600 group-hover:bg-emerald-200 transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg></div>
                                    Beranda
                                </a>
                                <a href="{{ route('sejarah') }}" class="group flex items-center gap-3 rounded-2xl px-4 py-3 text-base font-semibold text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 transition-all">
                                    <div class="w-8 h-8 rounded-lg bg-emerald-100/50 flex items-center justify-center text-emerald-600 group-hover:bg-emerald-200 transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg></div>
                                    Sejarah Masjid
                                </a>
                                <a href="{{ route('visimisi') }}" class="group flex items-center gap-3 rounded-2xl px-4 py-3 text-base font-semibold text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 transition-all">
                                    <div class="w-8 h-8 rounded-lg bg-emerald-100/50 flex items-center justify-center text-emerald-600 group-hover:bg-emerald-200 transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"/></svg></div>
                                    Visi & Misi
                                </a>
                                <a href="{{ route('struktur') }}" class="group flex items-center gap-3 rounded-2xl px-4 py-3 text-base font-semibold text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 transition-all">
                                    <div class="w-8 h-8 rounded-lg bg-emerald-100/50 flex items-center justify-center text-emerald-600 group-hover:bg-emerald-200 transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg></div>
                                    Struktur DKM
                                </a>
                                <a href="{{ route('sedekah') }}" class="group flex items-center gap-3 rounded-2xl px-4 py-3 text-base font-semibold text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 transition-all">
                                    <div class="w-8 h-8 rounded-lg bg-emerald-100/50 flex items-center justify-center text-emerald-600 group-hover:bg-emerald-200 transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div>
                                    Sedekah & Infak
                                </a>
                            </div>
                            <div class="py-6 space-y-3">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="block w-full text-center rounded-full bg-slate-100 px-3 py-3 text-base font-semibold text-slate-900 border border-slate-200 hover:bg-slate-200 transition-colors">Dashboard</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-center rounded-full bg-red-50 text-red-600 px-3 py-3 text-base font-semibold border border-red-100 hover:bg-red-100 transition-colors">
                                            Logout
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="block w-full text-center rounded-full bg-slate-100 px-3 py-3 text-base font-semibold text-slate-900 border border-slate-200 hover:bg-slate-200 transition-colors">Masuk</a>
                                    <a href="{{ route('register') }}" class="block w-full text-center rounded-full bg-emerald-600 px-3 py-3 text-base font-semibold text-white shadow-lg shadow-emerald-500/20 hover:bg-emerald-500 transition-colors">Daftar Akun</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow pt-24 z-10 relative">
            {{ $slot }}
        </main>

        <!-- Modern Dark Footer -->
        <footer class="bg-slate-950 text-slate-300 relative border-t border-slate-800 overflow-hidden z-10">
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute -top-1/2 -right-1/4 w-[1000px] h-[1000px] rounded-full bg-emerald-900/30 blur-[120px] opacity-60"></div>
                <div class="absolute bottom-[-10%] left-[-10%] w-[600px] h-[600px] rounded-full bg-teal-900/30 blur-[100px] opacity-50"></div>
            </div>

            <div class="relative mx-auto max-w-7xl px-6 py-16 sm:py-24 lg:px-8">
                <div class="xl:grid xl:grid-cols-3 xl:gap-16">
                    <!-- Left Col -->
                    <div class="space-y-8">
                        <a href="/" class="flex items-center gap-3">
                            <div class="p-1 bg-white/10 backdrop-blur-md rounded-full ring-1 ring-white/20">
                                <img class="h-14 w-14 object-cover rounded-full" src="{{ asset('images/logo_attijaniyah.jpg') }}" alt="Logo Masjid">
                            </div>
                            <span class="text-3xl font-extrabold tracking-tight text-white bg-clip-text text-transparent bg-gradient-to-r from-white to-slate-400">AT-Tijaniyah</span>
                        </a>
                        <p class="text-base leading-relaxed text-slate-400 max-w-xs font-light">
                            Pusat peradaban, informasi, dan layanan digital Masjid AT-Tijaniyah untuk seluruh umat. Mari makmurkan rumah Allah secara bersama-sama.
                        </p>
                        <div class="flex gap-x-6">
                            <!-- Socmed -->
                            <a href="#" class="text-slate-500 hover:text-emerald-400 hover:scale-110 transition-all duration-300">
                                <span class="sr-only">Facebook</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                            </a>
                            <a href="#" class="text-slate-500 hover:text-emerald-400 hover:scale-110 transition-all duration-300">
                                <span class="sr-only">Instagram</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Right Cols -->
                    <div class="mt-16 grid grid-cols-1 gap-8 sm:grid-cols-2 xl:col-span-2 xl:mt-0">
                        <div class="md:grid md:grid-cols-2 md:gap-8">
                            <div>
                                <h3 class="text-sm font-semibold leading-6 text-emerald-400 tracking-wider">Akses Cepat</h3>
                                <ul role="list" class="mt-6 space-y-4">
                                    <li><a href="{{ route('home') }}" class="group flex items-center gap-2 text-sm leading-6 text-slate-400 hover:text-white transition-colors"><span class="w-1.5 h-1.5 rounded-full bg-slate-700 group-hover:bg-emerald-500 transition-colors"></span>Beranda</a></li>
                                    <li><a href="{{ route('sedekah') }}" class="group flex items-center gap-2 text-sm leading-6 text-slate-400 hover:text-white transition-colors"><span class="w-1.5 h-1.5 rounded-full bg-slate-700 group-hover:bg-emerald-500 transition-colors"></span>Sedekah & Infak</a></li>
                                    <li><a href="/login" class="group flex items-center gap-2 text-sm leading-6 text-emerald-600/80 hover:text-emerald-400 transition-colors"><span class="w-1.5 h-1.5 rounded-full bg-emerald-900 group-hover:bg-emerald-500 transition-colors"></span>Login Pengurus</a></li>
                                </ul>
                            </div>
                            <div class="mt-10 md:mt-0">
                                <h3 class="text-sm font-semibold leading-6 text-emerald-400 tracking-wider">Tentang Kami</h3>
                                <ul role="list" class="mt-6 space-y-4">
                                    <li><a href="{{ route('sejarah') }}" class="group flex items-center gap-2 text-sm leading-6 text-slate-400 hover:text-white transition-colors"><span class="w-1.5 h-1.5 rounded-full bg-slate-700 group-hover:bg-emerald-500 transition-colors"></span>Sejarah</a></li>
                                    <li><a href="{{ route('visimisi') }}" class="group flex items-center gap-2 text-sm leading-6 text-slate-400 hover:text-white transition-colors"><span class="w-1.5 h-1.5 rounded-full bg-slate-700 group-hover:bg-emerald-500 transition-colors"></span>Visi Misi</a></li>
                                    <li><a href="{{ route('struktur') }}" class="group flex items-center gap-2 text-sm leading-6 text-slate-400 hover:text-white transition-colors"><span class="w-1.5 h-1.5 rounded-full bg-slate-700 group-hover:bg-emerald-500 transition-colors"></span>Struktur DKM</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="mt-10 sm:mt-0">
                            <h3 class="text-sm font-semibold leading-6 text-emerald-400 tracking-wider mb-6">Lokasi Masjid</h3>
                            <div class="rounded-2xl overflow-hidden ring-1 ring-white/10 shadow-2xl bg-slate-900 p-1 group">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.1657770839206!2d107.49915017419208!3d-6.870730367223361!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e4c00b28fdd3%3A0xe0fb0456c886c74f!2sMasjid%20At%20Tijaniyyah!5e0!3m2!1sid!2sid!4v1758162751747!5m2!1sid!2sid" 
                                        class="w-full h-48 rounded-xl opacity-80 group-hover:opacity-100 transition-opacity duration-500 blur-[1px] group-hover:blur-none" 
                                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <p class="mt-4 text-sm text-slate-400 leading-relaxed flex items-start gap-2">
                                <svg class="w-5 h-5 text-emerald-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                                Jl. Cikandang, Cimareme, Kec. Ngamprah, Kab. Bandung Barat, Jabar 40552
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Bottom Footer -->
                <div class="mt-16 border-t border-slate-800/80 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-xs leading-5 text-slate-500">&copy; {{ date('Y') }} Masjid AT-Tijaniyah. Dirancang dengan keikhlasan.</p>
                </div>
            </div>
        </footer>
    </div>

    <!-- Scroll Top Button -->
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
                scrollTopBtn.classList.add('show');
            } else {
                scrollTopBtn.classList.remove('show');
            }
        }
        function scrollToTop() {
            window.scrollTo({top: 0, behavior: 'smooth'});
        }
    </script>
</body>
</html>
