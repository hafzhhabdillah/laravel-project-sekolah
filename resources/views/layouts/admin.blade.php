<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel - {{ $title ?? 'SMK TARUNA BHAKTI DEPOK' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-slate-100 min-h-screen">
    <!-- Topbar Admin Simpel -->
    <nav class="bg-white border-b border-slate-200 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Sisi Kiri: Brand Admin -->
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 bg-slate-900 rounded-xl flex items-center justify-center text-white font-bold text-sm">
                        ADM
                    </div>
                    <span class="font-bold text-slate-800 text-base">Admin Panel</span>
                </div>

                <!-- Sisi Kanan: Menu User & Kembali ke Web Utama -->
                <div class="flex items-center gap-4">
                    <a href="{{ url('/') }}" class="text-xs font-semibold text-slate-500 hover:text-blue-600 transition-colors">
                        &larr; Lihat Website Publik
                    </a>

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center gap-2 px-3 py-1.5 border border-slate-200 text-sm font-medium rounded-xl text-slate-700 bg-white hover:bg-slate-50 transition-all">
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('dashboard')">Dashboard</x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Log Out
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>
    </nav>

    <!-- Content Admin -->
    <main class="py-8">
        @yield('content')
    </main>
</body>
</html>
