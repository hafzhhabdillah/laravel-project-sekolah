@extends('layouts.app')

@section('content')
    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Flash Message Success -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-2xl font-medium shadow-sm flex items-center gap-3">
                    <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-slate-800">Status Pendaftaran PPDB</h2>
                    <p class="text-sm text-slate-500">Informasi status kelulusan dan rincian data formulir Anda.</p>
                </div>
            </div>

            <!-- KOTAK STATUS DINAMIS -->
            @if (strtolower($ppdb->status) == 'diterima')
                <div class="bg-gradient-to-r from-emerald-500 to-teal-600 text-white p-8 rounded-[28px] mb-8 shadow-xl relative overflow-hidden">
                    <span class="inline-block px-4 py-1 bg-white/20 backdrop-blur-md rounded-full text-xs font-semibold uppercase tracking-wider mb-3">Pengumuman Hasil</span>
                    <h2 class="font-extrabold text-3xl mb-2">Selamat! Anda Diterima</h2>
                    <p class="text-emerald-100 max-w-xl text-sm leading-relaxed">Pendaftaran Anda telah diverifikasi dan dinyatakan diterima di sekolah ini. Silakan pantau informasi selanjutnya untuk daftar ulang.</p>
                </div>
            @elseif(strtolower($ppdb->status) == 'ditolak')
                <div class="bg-gradient-to-r from-rose-500 to-red-600 text-white p-8 rounded-[28px] mb-8 shadow-xl relative overflow-hidden">
                    <span class="inline-block px-4 py-1 bg-white/20 backdrop-blur-md rounded-full text-xs font-semibold uppercase tracking-wider mb-3">Pengumuman Hasil</span>
                    <h2 class="font-extrabold text-3xl mb-2">Mohon Maaf, Anda Belum Diterima</h2>
                    <p class="text-rose-100 max-w-xl text-sm leading-relaxed">Terima kasih telah mendaftar. Berdasarkan hasil seleksi, mohon maaf Anda belum dapat diterima pada periode ini.</p>
                </div>
            @else
                <div class="bg-gradient-to-r from-amber-500 to-orange-500 text-white p-8 rounded-[28px] mb-8 shadow-xl relative overflow-hidden">
                    <span class="inline-block px-4 py-1 bg-white/20 backdrop-blur-md rounded-full text-xs font-semibold uppercase tracking-wider mb-3">Pengumuman Hasil</span>
                    <h2 class="font-extrabold text-3xl mb-2">Data Sedang Diproses</h2>
                    <p class="text-amber-100 max-w-xl text-sm leading-relaxed">Pendaftaran Anda berstatus <strong>Pending</strong> dan sedang dalam antrean verifikasi oleh panitia seleksi sekolah.</p>
                </div>
            @endif

            <!-- KARTU RINCIAN BIODATA -->
            <div class="bg-white rounded-[28px] shadow-sm border border-slate-100 overflow-hidden mb-6">
                <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/50 flex flex-wrap items-center justify-between gap-3">
                    <h3 class="font-bold text-slate-800 text-base">Rincian Data Pendaftar</h3>

                    <!-- KUMPULAN TOMBOL AKSI -->
                    <div class="flex items-center gap-2">
                        <!-- Tombol Lihat Detail Lengkap -->
                        <a href="{{ route('user.ppdb.detail') }}"
                            class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-semibold px-4 py-2 rounded-xl transition shadow-sm shadow-indigo-600/20">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            Lihat Detail Lengkap
                        </a>

                        <!-- Tombol Ekspor PDF Bukti Pendaftaran -->
                        <a href="{{ route('user.ppdb.export-pdf') }}" target="_blank"
                            class="inline-flex items-center gap-2 bg-rose-600 hover:bg-rose-700 text-white text-xs font-semibold px-4 py-2 rounded-xl transition shadow-sm shadow-rose-600/20">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Ekspor PDF Bukti Pendaftaran
                        </a>

                        <!-- Tombol Ekspor Excel (DISISIPKAN DI SINI) -->
                        <a href="{{ route('user.ppdb.export-excel') }}"
                            class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold px-4 py-2 rounded-xl transition shadow-sm shadow-emerald-600/20">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            Export to Excel
                        </a>
                    </div>
                </div>

                <!-- Data grid rincian siswa -->
                <div class="p-6 sm:p-8 grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                    <div class="space-y-1">
                        <span class="text-slate-400 block text-xs font-semibold uppercase tracking-wider">Nama Lengkap</span>
                        <p class="font-bold text-slate-800 text-base">{{ $ppdb->nama_lengkap }}</p>
                    </div>

                    <div class="space-y-1">
                        <span class="text-slate-400 block text-xs font-semibold uppercase tracking-wider">Asal Sekolah</span>
                        <p class="font-semibold text-slate-700 text-base">{{ $ppdb->asal_sekolah ?? '-' }}</p>
                    </div>

                    <div class="space-y-1">
                        <span class="text-slate-400 block text-xs font-semibold uppercase tracking-wider">NISN</span>
                        <p class="font-semibold text-slate-700 text-base">{{ $ppdb->nisn ?? '-' }}</p>
                    </div>

                    <div class="space-y-1">
                        <span class="text-slate-400 block text-xs font-semibold uppercase tracking-wider">Jurusan Pilihan</span>
                        <p class="font-semibold text-slate-700 text-base">{{ $ppdb->jurusan_pilihan ?? '-' }}</p>
                    </div>

                    <div class="space-y-1">
                        <span class="text-slate-400 block text-xs font-semibold uppercase tracking-wider">Jenis Kelamin</span>
                        <p class="font-semibold text-slate-700 text-base">{{ $ppdb->jenis_kelamin ?? '-' }}</p>
                    </div>

                    <div class="space-y-1">
                        <span class="text-slate-400 block text-xs font-semibold uppercase tracking-wider">No. HP Orang Tua</span>
                        <p class="font-semibold text-slate-700 text-base">{{ $ppdb->no_hp_ortu ?? '-' }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
