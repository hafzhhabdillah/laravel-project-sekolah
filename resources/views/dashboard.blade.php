@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-xl text-slate-800 leading-tight">
                {{ __('Dashboard Overview') }}
            </h2>
            <span class="text-xs font-semibold px-3 py-1 bg-slate-100 text-slate-600 rounded-full">
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </span>
        </div>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <!-- Banner Welcome -->
        <div
            class="relative overflow-hidden bg-gradient-to-r from-blue-600 to-indigo-700 rounded-3xl p-6 sm:p-8 text-white shadow-xl shadow-blue-500/10">

            <div class="relative z-10 flex flex-col sm:flex-row sm:items-center justify-between gap-4">

                <!-- Sisi Kiri: Foto Profil & Info User -->
                <div class="flex items-center space-x-4 sm:space-x-5">
                    <!-- Foto Profil -->
                    <div class="relative flex-shrink-0">
                        <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&color=7F9CF5&background=EBF4FF&bold=true&size=128' }}"
                            alt="{{ Auth::user()->name }}"
                            class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl object-cover border-2 border-white/40 shadow-md">
                    </div>

                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span
                                class="uppercase tracking-wider text-[10px] font-extrabold bg-white/20 px-2.5 py-0.5 rounded-full text-white backdrop-blur-md">
                                ROLE: {{ Auth::user()->role ?? 'SISWA' }}
                            </span>
                        </div>
                        <h1 class="text-xl sm:text-2xl font-bold">Selamat Datang, {{ Auth::user()->name }}! 👋</h1>
                        <p class="text-xs text-blue-100/80 mt-0.5">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <!-- Sisi Kanan: Tombol Edit Profil -->
                <div class="flex-shrink-0 pt-2 sm:pt-0">
                    <a href="{{ route('profile.edit') }}"
                        class="inline-flex items-center justify-center w-full sm:w-auto gap-2 text-xs font-semibold bg-white/10 hover:bg-white/20 text-white px-4 py-2.5 sm:py-2 rounded-xl backdrop-blur-md border border-white/20 transition-all shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Edit Profil
                    </a>
                </div>

            </div>

            <!-- Hiasan Background Pattern -->
            <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-white/5 rounded-full blur-2xl pointer-events-none">
            </div>
        </div>
        <!-- PENGECEKAN ROLE GURU / ADMIN -->
        @if (in_array(strtolower(Auth::user()->role ?? ''), ['guru', 'admin']))
            <!-- Metric Stat Cards (Perbaikan Grid: 3 Kolom) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <!-- Card Total Guru -->
                <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
                    <div class="p-3 bg-blue-50 text-blue-600 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-medium">Total Guru</p>
                        <h3 class="text-2xl font-black text-blue-600">{{ $totalGuru ?? 0 }} <span
                                class="text-xs font-normal text-slate-400">Guru</span></h3>
                    </div>
                </div>

                <!-- Card Total Siswa -->
                <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
                    <div class="p-3 bg-indigo-50 text-indigo-600 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-medium">Total Siswa</p>
                        <h3 class="text-2xl font-black text-indigo-600">{{ $totalSiswa ?? 0 }} <span
                                class="text-xs font-normal text-slate-400">Siswa</span></h3>
                    </div>
                </div>

                <!-- Card Total Galeri -->
                <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
                    <div class="p-3 bg-emerald-50 text-emerald-600 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-medium">Total Galeri</p>
                        <h3 class="text-2xl font-black text-emerald-600">{{ $totalGaleri ?? 0 }} <span
                                class="text-xs font-normal text-slate-400">Foto</span></h3>
                    </div>
                </div>
            </div>

            <!-- TAMPILAN PANEL GURU / ADMIN -->
            <div class="pt-2">
                <h3 class="text-sm font-bold text-slate-700 uppercase tracking-wider mb-4">Panel Pengelolaan Sekolah
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Card Kelola Galeri -->
                    <div
                        class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group">
                        <div class="flex items-start gap-4">
                            <div
                                class="p-3 bg-blue-50 text-blue-600 rounded-2xl group-hover:bg-blue-600 group-hover:text-white transition-all">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h4
                                    class="text-base font-bold text-slate-800 group-hover:text-blue-600 transition-colors">
                                    Kelola Galeri Sekolah</h4>
                                <p class="text-xs text-slate-500 mt-1 leading-relaxed">Upload foto kegiatan baru, ubah
                                    deskripsi, atau hapus foto lama dari galeri publik.</p>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-slate-50 flex items-center justify-between">
                            <span class="text-[11px] text-slate-400">CRUD Foto Galeri</span>
                            <a href="{{ route('admin.gallery.index') }}"
                                class="inline-flex items-center gap-1.5 text-xs font-bold text-blue-600 hover:text-blue-700">
                                Buka CRUD Galeri
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Card Pengaturan Sekolah -->
                    <div
                        class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group">
                        <div class="flex items-start gap-4">
                            <div
                                class="p-3 bg-slate-100 text-slate-700 rounded-2xl group-hover:bg-slate-800 group-hover:text-white transition-all">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4
                                    class="text-base font-bold text-slate-800 group-hover:text-slate-900 transition-colors">
                                    Pengaturan Informasi Sekolah</h4>
                                <p class="text-xs text-slate-500 mt-1 leading-relaxed">Atur nama sekolah, nomor
                                    WhatsApp/kontak, alamat, serta link Google Maps.</p>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-slate-50 flex items-center justify-between">
                            <span class="text-[11px] text-slate-400">Konfigurasi Identitas</span>
                            <a href="{{ route('admin.settings.edit') }}"
                                class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-700 hover:text-slate-900">
                                Buka Pengaturan
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- TAMPILAN KHUSUS SISWA / USER -->
            <div class="space-y-6">
                <div class="bg-amber-50 border border-amber-200/60 rounded-2xl p-5 flex items-start gap-4">
                    <div class="p-2.5 bg-amber-500 text-white rounded-xl shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h18">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-amber-900">Portal Siswa Active</h4>
                        <p class="text-xs text-amber-800/80 mt-1 leading-relaxed">
                            Selamat datang di portal siswa! Gunakan menu di bawah untuk melihat album dokumentasi
                            sekolah dan informasi kontak.
                        </p>
                    </div>
                </div>

                <h3 class="text-sm font-bold text-slate-700 uppercase tracking-wider">Akses Informasi Siswa</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div
                        class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group">
                        <div class="flex items-start gap-4">
                            <div
                                class="p-3 bg-blue-50 text-blue-600 rounded-2xl group-hover:bg-blue-600 group-hover:text-white transition-all">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h4
                                    class="text-base font-bold text-slate-800 group-hover:text-blue-600 transition-colors">
                                    Dokumentasi Kegiatan</h4>
                                <p class="text-xs text-slate-500 mt-1 leading-relaxed">Lihat koleksi foto event
                                    sekolah, ekstrakurikuler, dan kegiatan pembelajaran.</p>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-slate-50 flex items-center justify-between">
                            <span class="text-[11px] text-slate-400">Album Foto</span>
                            <a href="{{ route('gallery') }}"
                                class="inline-flex items-center gap-1.5 text-xs font-bold text-blue-600 hover:text-blue-700">
                                Lihat Galeri
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div
                        class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group">
                        <div class="flex items-start gap-4">
                            <div
                                class="p-3 bg-emerald-50 text-emerald-600 rounded-2xl group-hover:bg-emerald-600 group-hover:text-white transition-all">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m0 0h4m-4 0a2 2 0 012-2h2a2 2 0 012 2m-6 0v-4a2 2 0 012-2h2a2 2 0 012 2v4">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h4
                                    class="text-base font-bold text-slate-800 group-hover:text-emerald-600 transition-colors">
                                    Informasi & Lokasi</h4>
                                <p class="text-xs text-slate-500 mt-1 leading-relaxed">Cek alamat lengkap sekolah,
                                    kontak panitia/layanan, dan petunjuk peta Google Maps.</p>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-slate-50 flex items-center justify-between">
                            <span class="text-[11px] text-slate-400">Kontak & Map</span>
                            <a href="{{ route('user.info') }}"
                                class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-600 hover:text-emerald-700">
                                Lihat Info
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection
