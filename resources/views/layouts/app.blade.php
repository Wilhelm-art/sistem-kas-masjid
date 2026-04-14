<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Masjid AT-Tijaniyah') }} - Admin</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">


        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Outfit', sans-serif;
            }
            [x-cloak] { display: none !important; }
        </style>
    </head>
    <body class="font-sans antialiased text-slate-800 bg-slate-50 selection:bg-emerald-500 selection:text-white">
        <div class="min-h-screen flex flex-col">
            @include('layouts.navigation')

            @if (isset($header))
                <header class="bg-white border-b border-slate-200/60 shadow-sm sticky top-0 z-40 backdrop-blur-md bg-white/80">
                    <div class="max-w-7xl mx-auto py-5 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main class="flex-grow">
                {{ $slot }}
            </main>
            
            <footer class="bg-white border-t border-slate-200 mt-auto py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-sm text-slate-500">
                    &copy; {{ date('Y') }} Masjid AT-Tijaniyah. All rights reserved.
                </div>
            </footer>
        </div>
    </body>
</html>
