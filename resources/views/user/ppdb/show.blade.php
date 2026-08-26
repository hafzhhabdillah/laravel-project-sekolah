@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-6">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-slate-800">Detail Lengkap Pendaftaran PPDB</h2>
            <p class="text-xs text-slate-500">Informasi rincian data diri pendaftaran Anda.</p>
        </div>
        <a href="{{ route('user.ppdb.index') }}" class="bg-slate-200 hover:bg-slate-300 text-slate-700 text-xs font-semibold px-4 py-2 rounded-xl transition">
            &larr; Kembali
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 space-y-6">
        <!-- Info Utama -->
        <div class="border-b border-slate-100 pb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h3 class="text-lg font-bold text-slate-800">{{ $ppdb->nama_lengkap }}</h3>
                <p class="text-xs text-slate-500 font-mono">NISN: {{ $ppdb->nisn }}</p>
            </div>
            <div>
                <span class="px-3 py-1 text-xs font-bold rounded-full
                    {{ $ppdb->status == 'diterima' ? 'bg-emerald-100 text-emerald-700' : ($ppdb->status == 'ditolak' ? 'bg-rose-100 text-rose-700' : 'bg-amber-100 text-amber-700') }}">
                    Status: {{ strtoupper($ppdb->status) }}
                </span>
            </div>
        </div>

        <!-- Grid Data Rincian Lengkap Sesuai Form Create -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-sm">
            <div>
                <span class="block text-xs font-medium text-slate-400">NISN</span>
                <span class="font-semibold text-slate-800">{{ $ppdb->nisn ?? '-' }}</span>
            </div>
            <div>
                <span class="block text-xs font-medium text-slate-400">Nama Lengkap</span>
                <span class="font-semibold text-slate-800">{{ $ppdb->nama_lengkap ?? '-' }}</span>
            </div>
            <div>
                <span class="block text-xs font-medium text-slate-400">Jenis Kelamin</span>
                <span class="font-semibold text-slate-800">
                    {{ $ppdb->jenis_kelamin == 'L' ? 'Laki-laki' : ($ppdb->jenis_kelamin == 'P' ? 'Perempuan' : '-') }}
                </span>
            </div>
            <div>
                <span class="block text-xs font-medium text-slate-400">Tempat, Tanggal Lahir</span>
                <span class="font-semibold text-slate-800">
                    {{ $ppdb->tempat_lahir ?? '-' }}, {{ $ppdb->tanggal_lahir ? \Carbon\Carbon::parse($ppdb->tanggal_lahir)->translatedFormat('d F Y') : '-' }}
                </span>
            </div>
            <div>
                <span class="block text-xs font-medium text-slate-400">Asal Sekolah</span>
                <span class="font-semibold text-slate-800">{{ $ppdb->asal_sekolah ?? '-' }}</span>
            </div>
            <div>
                <span class="block text-xs font-medium text-slate-400">Jurusan Pilihan</span>
                <span class="font-semibold text-slate-800">{{ $ppdb->jurusan_pilihan ?? '-' }}</span>
            </div>
            <div>
                <span class="block text-xs font-medium text-slate-400">Nama Ayah</span>
                <span class="font-semibold text-slate-800">{{ $ppdb->nama_ayah ?? '-' }}</span>
            </div>
            <div>
                <span class="block text-xs font-medium text-slate-400">Nama Ibu</span>
                <span class="font-semibold text-slate-800">{{ $ppdb->nama_ibu ?? '-' }}</span>
            </div>
            <div class="sm:col-span-2">
                <span class="block text-xs font-medium text-slate-400">No. HP Orang Tua / Wali</span>
                <span class="font-semibold text-slate-800">{{ $ppdb->no_hp_ortu ?? '-' }}</span>
            </div>
            <div class="sm:col-span-2">
                <span class="block text-xs font-medium text-slate-400">Alamat Lengkap</span>
                <span class="font-semibold text-slate-800">{{ $ppdb->alamat ?? '-' }}</span>
            </div>
        </div>
    </div>
</div>
@endsection
