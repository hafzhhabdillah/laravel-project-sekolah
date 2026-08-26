@extends('layouts.app')

@section('content')
<div class="py-12 bg-slate-50 min-h-screen">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <!-- Header Navigasi Kembali & Judul -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 px-4 sm:px-0">
            <div>
                <h2 class="font-bold text-xl text-slate-800 leading-tight">
                    {{ __('Detail Pendaftaran PPDB') }}
                </h2>
                <p class="text-xs text-slate-500 mt-0.5">Data lengkap peserta didik baru.</p>
            </div>
            <div>
                <a href="{{ route('admin.ppdb.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-slate-200 hover:bg-slate-100 text-slate-700 text-xs font-bold rounded-2xl shadow-xs transition-all">
                    &larr; Kembali ke Daftar
                </a>
            </div>
        </div>

        <!-- Card Konten Utama -->
        <div class="bg-white p-8 sm:p-10 rounded-[32px] shadow-xl shadow-slate-100/50 border border-slate-100 space-y-8">

            <!-- Status Badge -->
            <div class="flex items-center justify-between pb-6 border-b border-slate-100">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Status Seleksi</span>
                <div>
                    @if($ppdb->status == 'diterima')
                        <span class="px-4 py-1.5 bg-emerald-50 text-emerald-600 rounded-full text-xs font-bold">Diterima</span>
                    @elseif($ppdb->status == 'ditolak')
                        <span class="px-4 py-1.5 bg-rose-50 text-rose-600 rounded-full text-xs font-bold">Ditolak</span>
                    @else
                        <span class="px-4 py-1.5 bg-amber-50 text-amber-600 rounded-full text-xs font-bold">Pending</span>
                    @endif
                </div>
            </div>

            <!-- SECTION: Data Siswa -->
            <div>
                <h3 class="text-sm font-bold text-blue-600 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Data Siswa
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 text-xs">
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Nama Lengkap</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->nama_lengkap ?? '-' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">NISN</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->nisn ?? '-' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Tempat, Tanggal Lahir</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->tempat_lahir ?? '-' }}, {{ $ppdb->tanggal_lahir ? \Carbon\Carbon::parse($ppdb->tanggal_lahir)->format('d M Y') : '-' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Asal Sekolah</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->asal_sekolah ?? '-' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Jurusan Pilihan</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->jurusan_pilihan ?? '-' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">No. HP / WA Siswa</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->no_hp ?? $ppdb->no_hp_siswa ?? '-' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Jenis Kelamin</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->jenis_kelamin == 'L' ? 'Laki-laki' : ($ppdb->jenis_kelamin == 'P' ? 'Perempuan' : '-') }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Agama</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->agama ?? '-' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Golongan Darah</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->golongan_darah ?? '-' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Anak Ke / Jumlah Saudara</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->anak_ke ?? '-' }} dari {{ $ppdb->jumlah_saudara ?? '-' }} bersaudara</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Tinggi / Berat Badan</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->tinggi_badan ?? '-' }} cm / {{ $ppdb->berat_badan ?? '-' }} kg</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Hobi</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->hobi ?? '-' }}</strong>
                    </div>
                </div>
            </div>

            <!-- SECTION: Tempat Tinggal -->
            <div>
                <h3 class="text-sm font-bold text-blue-600 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Tempat Tinggal
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 text-xs">
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100 md:col-span-2">
                        <span class="text-slate-400 block mb-1">Alamat Lengkap</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->alamat ?? '-' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">RT / RW</span>
                        <strong class="text-slate-800 text-sm">RT {{ $ppdb->rt ?? '-' }} / RW {{ $ppdb->rw ?? '-' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Kelurahan</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->kelurahan ?? '-' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Kabupaten / Kota</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->kabupaten ?? $ppdb->kota ?? '-' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Provinsi</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->provinsi ?? '-' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Kode Pos</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->kode_pos ?? '-' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Status Tempat Tinggal</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->tempat_tinggal ?? '-' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Moda Transportasi</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->moda_transportasi ?? '-' }}</strong>
                    </div>
                </div>
            </div>

            <!-- SECTION: Informasi Lainnya & Orang Tua -->
            <div>
                <h3 class="text-sm font-bold text-blue-600 uppercase tracking-wider mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    Informasi Orang Tua & Lainnya
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 text-xs">
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Nama Ayah</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->nama_ayah ?? '-' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Pekerjaan Ayah</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->pekerjaan_ayah ?? '-' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Pendidikan Ayah</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->pendidikan_ayah ?? '-' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Nama Ibu</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->nama_ibu ?? '-' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Pekerjaan Ibu</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->pekerjaan_ibu ?? '-' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Pendidikan Ibu</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->pendidikan_ibu ?? '-' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">No. HP / WA Orang Tua</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->no_hp_ortu ?? '-' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Penghasilan Orang Tua</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->penghasilan_ortu ?? '-' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Kebutuhan Disabilitas</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->kebutuhan_disabilitas ?? $ppdb->jenis_disabilitas ?? 'Tidak ada' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Jenis Beasiswa</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->jenis_beasiswa ?? 'Tidak menerima' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Cara Belajar</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->cara_belajar ?? '-' }}</strong>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <span class="text-slate-400 block mb-1">Informasi Tambahan</span>
                        <strong class="text-slate-800 text-sm">{{ $ppdb->informasi_tambahan ?? 'Tidak ada' }}</strong>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
