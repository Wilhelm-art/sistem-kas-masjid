<nav x-data="{ open: false }" class="bg-white border-b border-slate-200/60 sticky top-0 z-50">
    <!-- Desktop Navigation -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2 group">
                        <div class="w-8 h-8 bg-emerald-100 rounded-lg flex items-center justify-center text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <span class="font-bold text-xl tracking-tight text-slate-800">SIMAS</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-1 sm:-my-px sm:ms-8 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-sm font-medium">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.cashbooks.index')" :active="request()->routeIs('admin.cashbooks.*')" class="text-sm font-medium">
                        {{ __('Buku Kas') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.*')" class="text-sm font-medium">
                        {{ __('Kategori') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.transactions.index')" :active="request()->routeIs('admin.transactions.*')" class="text-sm font-medium">
                        {{ __('Transaksi') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.schedules.index')" :active="request()->routeIs('admin.schedules.*')" class="text-sm font-medium">
                        {{ __('Jadwal') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.donations.index')" :active="request()->routeIs('admin.donations.*')" class="text-sm font-medium">
                        {{ __('Donasi') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.reports.index')" :active="request()->routeIs('admin.reports.*')" class="text-sm font-medium">
                        {{ __('Laporan') }}
                    </x-nav-link>
                    <div class="flex items-center px-3">
                        <a href="{{ route('home') }}" target="_blank" class="text-sm font-medium text-emerald-600 hover:text-emerald-700 bg-emerald-50 px-3 py-1.5 rounded-full flex items-center gap-1 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                            Public Site
                        </a>
                    </div>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-slate-600 hover:text-emerald-600 hover:bg-slate-50 focus:outline-none transition ease-in-out duration-150">
                            <div class="w-7 h-7 rounded-full bg-emerald-100 text-emerald-700 font-bold flex items-center justify-center mr-2">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-sm">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                {{ __('Profil Saya') }}
                            </div>
                        </x-dropdown-link>
                        <div class="border-t border-slate-100"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                             Swal.fire({
                                                title: 'Keluar aplikasi?',
                                                text: 'Sesi Anda akan diakhiri.',
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#10b981',
                                                cancelButtonColor: '#f43f5e',
                                                confirmButtonText: 'Ya, keluar',
                                                cancelButtonText: 'Batal',
                                                customClass: {
                                                    popup: 'rounded-2xl',
                                                    confirmButton: 'rounded-lg',
                                                    cancelButton: 'rounded-lg'
                                                }
                                             }).then((result) => {
                                                if (result.isConfirmed) {
                                                    this.closest('form').submit();
                                                }
                                             })">
                                <div class="flex items-center gap-2 text-red-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                                    {{ __('Log Out') }}
                                </div>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger Button (Mobile) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-slate-400 hover:text-slate-500 hover:bg-slate-100 focus:outline-none focus:bg-slate-100 focus:text-slate-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-b border-slate-200">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.cashbooks.index')" :active="request()->routeIs('admin.cashbooks.*')">
                {{ __('Buku Kas') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.*')">
                {{ __('Kategori') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.transactions.index')" :active="request()->routeIs('admin.transactions.*')">
                {{ __('Transaksi') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.schedules.index')" :active="request()->routeIs('admin.schedules.*')">
                {{ __('Jadwal') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.donations.index')" :active="request()->routeIs('admin.donations.*')">
                {{ __('Donasi') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.reports.index')" :active="request()->routeIs('admin.reports.*')">
                {{ __('Laporan') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('home')" target="_blank" class="text-emerald-600 font-medium bg-emerald-50">
                <span class="flex items-center gap-2">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                    Lihat Web Publik
                </span>
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-slate-200">
            <div class="px-4 flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-700 font-bold flex items-center justify-center text-lg">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <div class="font-medium text-base text-slate-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-slate-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profil Saya') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                     this.closest('form').submit();"
                            class="text-red-600">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
