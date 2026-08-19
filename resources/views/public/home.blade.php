@extends('layouts.public')

@section('content')
<!-- HERO SECTION -->
<section class="relative bg-gradient-to-b from-blue-50/50 to-white py-20 lg:py-28 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="bg-blue-100 text-blue-700 text-xs font-bold px-3.5 py-1.5 rounded-full uppercase tracking-wider">
                    Selamat Datang
                </span>
                <h1 class="text-4xl sm:text-5xl font-extrabold text-slate-900 tracking-tight mt-4 leading-tight">
                    Mewujudkan Generasi Cerdas & Berkarakter
                </h1>
                <p class="mt-4 text-lg text-slate-600 leading-relaxed">
                    Selamat datang di {{ $setting->school_name ?? 'Sekolah Kami' }}. Tempat terbaik untuk membangun masa depan dengan keahlian, teknologi, dan akhlak mulia.
                </p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="{{ route('about') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3.5 rounded-xl shadow-lg shadow-blue-500/25 transition-all">
                        Pelajari Lebih Lanjut
                    </a>
                    <a href="{{ route('contact') }}" class="bg-white hover:bg-slate-100 text-slate-700 border border-slate-300 font-semibold px-6 py-3.5 rounded-xl transition-all">
                        Hubungi Kami
                    </a>
                </div>
            </div>

            <!-- Visual Graphic / Cards -->
            <div class="relative">
                <div class="bg-gradient-to-tr from-blue-600 to-indigo-600 rounded-3xl p-8 text-white shadow-2xl relative z-10">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur rounded-2xl flex items-center justify-center">
                            <i class="bi bi-award-fill text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">Pendidikan Unggul</h3>
                            <p class="text-blue-100 text-sm">Kurikulum Terintegrasi Industri</p>
                        </div>
                    </div>
                    <p class="text-blue-50 text-sm leading-relaxed mb-6">
                        Kami menyediakan fasilitas modern, tenaga pendidik profesional, serta program ekstrakurikuler yang mendukung minat dan bakat siswa.
                    </p>
                    <div class="bg-white/10 backdrop-blur rounded-2xl p-4 flex justify-between items-center text-sm font-medium">
                        <span>Status Akreditasi</span>
                        <span class="bg-emerald-400 text-slate-900 font-bold px-3 py-1 rounded-lg text-xs">A (Sangat Baik)</span>
                    </div>
                </div>
                <!-- Background Decorative Pattern -->
                <div class="absolute -bottom-6 -right-6 w-full h-full bg-blue-200 rounded-3xl z-0"></div>
            </div>
        </div>
    </div>
</section>

<!-- KEUNGGULAN SEKOLAH -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-3xl font-bold text-slate-900">Kenapa Memilih Kami?</h2>
            <p class="text-slate-600 mt-2">Komitmen kami dalam menghadirkan lingkungan belajar yang ideal bagi setiap siswa.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100 hover:shadow-xl transition-all">
                <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-xl mb-4">
                    <i class="bi bi-laptop"></i>
                </div>
                <h3 class="font-bold text-slate-900 text-lg mb-2">Fasilitas Modern</h3>
                <p class="text-slate-600 text-sm leading-relaxed">Laboratorium komputer, ruang kelas ber-AC, serta jaringan WiFi cepat di seluruh area sekolah.</p>
            </div>

            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100 hover:shadow-xl transition-all">
                <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center text-xl mb-4">
                    <i class="bi bi-people-fill"></i>
                </div>
                <h3 class="font-bold text-slate-900 text-lg mb-2">Pengajar Profesional</h3>
                <p class="text-slate-600 text-sm leading-relaxed">Guru-guru berpengalaman yang siap membimbing dan mengarahkan potensi terbaik setiap siswa.</p>
            </div>

            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100 hover:shadow-xl transition-all">
                <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center text-xl mb-4">
                    <i class="bi bi-trophy-fill"></i>
                </div>
                <h3 class="font-bold text-slate-900 text-lg mb-2">Prestasi Gemilang</h3>
                <p class="text-slate-600 text-sm leading-relaxed">Berbagai raihan prestasi di tingkat daerah maupun nasional di bidang akademik dan non-akademik.</p>
            </div>
        </div>
    </div>
</section>
@endsection
