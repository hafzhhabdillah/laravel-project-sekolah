<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $setting->school_name ?? 'Website Sekolah' }}</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
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

    <!-- Include Navbar -->
    @include('layouts.navigation')

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
