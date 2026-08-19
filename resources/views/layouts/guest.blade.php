<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts & Icons -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-slate-800 bg-slate-900 selection:bg-blue-500 selection:text-white min-h-screen flex flex-col justify-center items-center py-10 px-4 sm:px-6 lg:px-8 relative overflow-x-hidden">

        <!-- Background Animated Ambient Light -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-32 -right-32 w-96 h-96 bg-blue-600/30 rounded-full blur-3xl animate-pulse duration-1000"></div>
            <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-indigo-600/30 rounded-full blur-3xl animate-pulse duration-1000" style="animation-delay: 2s;"></div>
        </div>

        <div class="w-full max-w-md relative z-10">
            <!-- Navigation Header -->
            <div class="flex items-center justify-between mb-6 transition-all duration-300">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white backdrop-blur-lg px-4 py-2.5 rounded-2xl text-xs font-semibold border border-white/15 transition-all duration-300 hover:-translate-x-1 shadow-lg shadow-black/10">
                    <i class="bi bi-arrow-left text-sm"></i>
                    <span>Kembali ke Beranda</span>
                </a>

                <span class="text-xs font-semibold text-slate-400 bg-slate-800/80 px-3 py-1.5 rounded-full border border-slate-700/50 backdrop-blur-md">
                    Portal Sekolah
                </span>
            </div>

            <!-- Form Card Container with Subtle Entrance Animation -->
            <div class="bg-white/95 backdrop-blur-xl rounded-3xl p-8 shadow-2xl shadow-slate-950/40 border border-white/40 transition-all duration-500 hover:shadow-blue-500/10">
                {{ $slot }}
            </div>

            <!-- Footer -->
            <p class="mt-8 text-center text-xs text-slate-400 font-medium">
                &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
            </p>
        </div>
    </body>
</html>
