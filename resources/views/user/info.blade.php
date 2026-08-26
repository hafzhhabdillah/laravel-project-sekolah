@extends('layouts.app')

@section('content')
    <div class="py-10 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            <!-- Banner Header -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-3xl p-8 md:p-10 text-white shadow-xl shadow-blue-500/10">
                <div class="max-w-3xl space-y-3">
                    <span class="bg-white/20 text-xs font-bold px-3.5 py-1.5 rounded-full uppercase tracking-wider text-blue-100">
                        Informasi Sekolah
                    </span>
                    <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight">
                        SMK Taruna Bhakti Depok
                    </h1>
                    <p class="text-blue-100 text-sm md:text-base leading-relaxed">
                        Pelajari profil, visi, misi, serta fasilitas pendukung pembelajaran di lingkungan SMK Taruna Bhakti Depok.
                    </p>
                </div>
            </div>

            <!-- Visi & Misi Card -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Visi -->
                <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-4">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center font-bold">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-slate-900">Visi Sekolah</h2>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Menjadi SMK Unggulan yang Menghasilkan Lulusan Berkarakter, Kompeten di Bidang Teknologi Informasi, serta Siap Bersaing di Tingkat Global.
                    </p>
                </div>

                <!-- Misi -->
                <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-4">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center font-bold">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-slate-900">Misi Sekolah</h2>
                    <ul class="text-slate-600 text-sm space-y-2 list-disc list-inside leading-relaxed">
                        <li>Menyelenggarakan kurikulum berbasis industri terkini.</li>
                        <li>Meningkatkan kualitas SDM melalui sertifikasi keahlian.</li>
                        <li>Membina karakter peserta didik berlandaskan imtak dan imtek.</li>
                    </ul>
                </div>
            </div>

            <!-- Detail Kontak & Lokasi -->
            <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm space-y-6">
                <h2 class="text-xl font-bold text-slate-900">Alamat & Kontak Resmi</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-sm">
                    <div class="p-4 bg-slate-50 rounded-xl space-y-1">
                        <span class="text-xs text-slate-400 font-bold uppercase">Alamat</span>
                        <p class="font-semibold text-slate-700">Jl. Pekapuran, Pekapuran, Kec. Cimanggis, Kota Depok, Jawa Barat</p>
                    </div>
                    <div class="p-4 bg-slate-50 rounded-xl space-y-1">
                        <span class="text-xs text-slate-400 font-bold uppercase">Email</span>
                        <p class="font-semibold text-slate-700">info@smktarunabhakti.sch.id</p>
                    </div>
                    <div class="p-4 bg-slate-50 rounded-xl space-y-1">
                        <span class="text-xs text-slate-400 font-bold uppercase">Telepon</span>
                        <p class="font-semibold text-slate-700">(021) 8744810</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
