<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $setting->school_name ?? 'Website Sekolah' }}</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js (WAJIB ADA untuk fungsionalitas hamburger menu) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Google Fonts (Inter) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 flex flex-col min-h-screen">

    <!-- NAVBAR (Menggunakan x-data Alpine.js) -->
    <nav x-data="{ open: false }" class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">

                <!-- Logo & Brand -->
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="bg-blue-600 text-white p-2.5 rounded-xl shadow-md shadow-blue-500/20 shrink-0">
                        <i class="bi bi-mortarboard-fill text-xl"></i>
                    </div>
                    <span class="font-bold text-base sm:text-xl text-slate-900 tracking-tight leading-snug">
                        {{ $setting->school_name ?? 'SMK TARUNA BHAKTI DEPOK' }}
                    </span>
                </a>

                <!-- Desktop Navigation Links (Tampil di Layar Sedang/Besar) -->
                <div class="hidden md:flex items-center space-x-8 font-medium text-slate-600 text-sm">
                    <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors {{ request()->routeIs('home') ? 'text-blue-600 font-bold' : '' }}">Home</a>
                    <a href="{{ route('about') }}" class="hover:text-blue-600 transition-colors {{ request()->routeIs('about') ? 'text-blue-600 font-bold' : '' }}">About</a>
                    <a href="{{ route('gallery') }}" class="hover:text-blue-600 transition-colors {{ request()->routeIs('gallery') ? 'text-blue-600 font-bold' : '' }}">Gallery</a>
                    <a href="{{ route('contact') }}" class="hover:text-blue-600 transition-colors {{ request()->routeIs('contact') ? 'text-blue-600 font-bold' : '' }}">Contact</a>
                </div>

                <!-- Desktop Action Button (Tampil di Layar Sedang/Besar) -->
                <div class="hidden md:flex items-center gap-3">
                    @auth
                        <a href="{{ route('dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition-all shadow-md shadow-blue-500/20">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-slate-600 hover:text-blue-600 font-medium text-sm px-4 py-2">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition-all shadow-md shadow-blue-500/20">
                            Daftar
                        </a>
                    @endauth
                </div>

                <!-- HAMBURGER BUTTON (Tampil Khusus di Layar Mobile/HP) -->
                <div class="flex items-center md:hidden">
                    <button @click="open = !open" type="button" class="p-2 rounded-xl text-slate-600 hover:text-blue-600 hover:bg-slate-100 transition-all focus:outline-none">
                        <i class="bi" :class="open ? 'bi-x-lg text-2xl' : 'bi-list text-3xl'"></i>
                    </button>
                </div>

            </div>
        </div>

        <!-- MOBILE MENU DROPDOWN (Muncul saat Hamburger diklik) -->
        <div x-show="open"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="md:hidden bg-white border-b border-slate-200 px-4 pt-2 pb-6 space-y-3 shadow-lg">

            <a href="{{ route('home') }}" class="block px-3 py-2.5 rounded-xl font-semibold text-sm {{ request()->routeIs('home') ? 'bg-blue-50 text-blue-600' : 'text-slate-700 hover:bg-slate-50' }}">
                <i class="bi bi-house-door mr-2"></i> Home
            </a>
            <a href="{{ route('about') }}" class="block px-3 py-2.5 rounded-xl font-semibold text-sm {{ request()->routeIs('about') ? 'bg-blue-50 text-blue-600' : 'text-slate-700 hover:bg-slate-50' }}">
                <i class="bi bi-info-circle mr-2"></i> About
            </a>
            <a href="{{ route('gallery') }}" class="block px-3 py-2.5 rounded-xl font-semibold text-sm {{ request()->routeIs('gallery') ? 'bg-blue-50 text-blue-600' : 'text-slate-700 hover:bg-slate-50' }}">
                <i class="bi bi-images mr-2"></i> Gallery
            </a>
            <a href="{{ route('contact') }}" class="block px-3 py-2.5 rounded-xl font-semibold text-sm {{ request()->routeIs('contact') ? 'bg-blue-50 text-blue-600' : 'text-slate-700 hover:bg-slate-50' }}">
                <i class="bi bi-envelope mr-2"></i> Contact
            </a>

            <div class="pt-4 border-t border-slate-100 flex flex-col gap-2">
                @auth
                    <a href="{{ route('dashboard') }}" class="w-full text-center bg-blue-600 hover:bg-blue-700 text-white text-sm py-2.5 rounded-xl font-semibold transition-all shadow-sm">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="w-full text-center border border-slate-200 text-slate-700 hover:bg-slate-50 text-sm py-2.5 rounded-xl font-semibold transition-all">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="w-full text-center bg-blue-600 hover:bg-blue-700 text-white text-sm py-2.5 rounded-xl font-semibold transition-all">
                        Daftar
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-900 text-slate-400 mt-20 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-white font-bold text-lg mb-3">{{ $setting->school_name ?? 'Sekolah Kita' }}</h3>
                    <p class="text-sm leading-relaxed">{{ $setting->address ?? 'Alamat sekolah belum diatur.' }}</p>
                </div>
                <div>
                    <h4 class="text-white font-semibold text-sm mb-3">Kontak</h4>
                    <p class="text-sm"><i class="bi bi-telephone text-blue-500 mr-2"></i> {{ $setting->phone_number ?? '-' }}</p>
                </div>
                <div>
                    <h4 class="text-white font-semibold text-sm mb-3">Tautan Cepat</h4>
                    <div class="flex flex-col space-y-2 text-sm">
                        <a href="{{ route('about') }}" class="hover:text-white transition-colors">Tentang Kami</a>
                        <a href="{{ route('gallery') }}" class="hover:text-white transition-colors">Galeri Kegiatan</a>
                        <a href="{{ route('contact') }}" class="hover:text-white transition-colors">Hubungi Kami</a>
                    </div>
                </div>
            </div>
            <div class="border-t border-slate-800 mt-10 pt-6 text-center text-xs">
                &copy; {{ date('Y') }} {{ $setting->school_name ?? 'Website Sekolah' }}. All rights reserved.
            </div>
        </div>
    </footer>

</body>
</html>
