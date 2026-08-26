@extends('layouts.app')

@section('content')
<div class="py-8 bg-slate-50 min-h-screen">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header & Tombol Kembali -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Sunting Data Siswa</h2>
                <p class="text-sm text-slate-500">Perbarui informasi data calon siswa: <span class="font-semibold text-slate-700">{{ $ppdb->nama_lengkap }}</span></p>
            </div>
            <a href="{{ route('admin.ppdb.index') }}" class="inline-flex items-center px-4 py-2 bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-xs font-bold rounded-xl shadow-xs transition-all">
                &larr; Kembali
            </a>
        </div>

        <!-- Notifikasi Error -->
        @if ($errors->any())
            <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-700 rounded-2xl text-xs font-semibold space-y-1">
                <p class="font-bold">Oops! Periksa kembali data berikut:</p>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Card Form -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 sm:p-8">
            <form action="{{ route('admin.ppdb.update', $ppdb->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- NISN -->
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">NISN</label>
                        <input type="number" name="nisn" value="{{ old('nisn', $ppdb->nisn) }}" class="w-full rounded-xl border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500" required>
                    </div>

                    <!-- Nama Lengkap -->
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $ppdb->nama_lengkap) }}" class="w-full rounded-xl border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500" required>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="w-full rounded-xl border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500" required>
                            <option value="">-- Pilih --</option>
                            <option value="L" {{ old('jenis_kelamin', $ppdb->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin', $ppdb->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <!-- Tempat Lahir -->
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $ppdb->tempat_lahir) }}" class="w-full rounded-xl border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500" required>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $ppdb->tanggal_lahir) }}" class="w-full rounded-xl border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500" required>
                    </div>

                    <!-- Asal Sekolah -->
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">Asal Sekolah</label>
                        <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah', $ppdb->asal_sekolah) }}" class="w-full rounded-xl border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500" required>
                    </div>

                    <!-- Jurusan Pilihan -->
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">Jurusan Pilihan</label>
                        <select name="jurusan_pilihan" class="w-full rounded-xl border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500" required>
                            <option value="">-- Pilih Jurusan --</option>
                            <option value="Rekayasa Perangkat Lunak (RPL)" {{ old('jurusan_pilihan', $ppdb->jurusan_pilihan) == 'Rekayasa Perangkat Lunak (RPL)' ? 'selected' : '' }}>RPL</option>
                            <option value="Teknik Komputer dan Jaringan (TKJ)" {{ old('jurusan_pilihan', $ppdb->jurusan_pilihan) == 'Teknik Komputer dan Jaringan (TKJ)' ? 'selected' : '' }}>TKJ</option>
                            <option value="Multimedia (DKV)" {{ old('jurusan_pilihan', $ppdb->jurusan_pilihan) == 'Multimedia (DKV)' ? 'selected' : '' }}>Multimedia</option>
                        </select>
                    </div>

                    <!-- Status Pendaftaran -->
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">Status Pendaftaran</label>
                        <select name="status" class="w-full rounded-xl border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500" required>
                            <option value="pending" {{ old('status', $ppdb->status) == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                            <option value="diterima" {{ old('status', $ppdb->status) == 'diterima' ? 'selected' : '' }}>✅ Diterima</option>
                            <option value="ditolak" {{ old('status', $ppdb->status) == 'ditolak' ? 'selected' : '' }}>❌ Ditolak</option>
                        </select>
                    </div>

                    <!-- Nama Ayah -->
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">Nama Ayah</label>
                        <input type="text" name="nama_ayah" value="{{ old('nama_ayah', $ppdb->nama_ayah) }}" class="w-full rounded-xl border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500" required>
                    </div>

                    <!-- Nama Ibu -->
                    <div>
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">Nama Ibu</label>
                        <input type="text" name="nama_ibu" value="{{ old('nama_ibu', $ppdb->nama_ibu) }}" class="w-full rounded-xl border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500" required>
                    </div>

                    <!-- No HP Orang Tua -->
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">No. HP Orang Tua</label>
                        <input type="number" name="no_hp_ortu" value="{{ old('no_hp_ortu', $ppdb->no_hp_ortu) }}" class="w-full rounded-xl border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500" required>
                    </div>

                    <!-- Alamat Lengkap -->
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-slate-600 uppercase tracking-wider mb-1.5">Alamat Lengkap</label>
                        <textarea name="alamat" rows="2" class="w-full rounded-xl border-slate-200 bg-slate-50/50 px-3.5 py-2.5 text-sm focus:border-blue-500 focus:ring-blue-500" required>{{ old('alamat', $ppdb->alamat) }}</textarea>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="pt-5 border-t border-slate-100 flex items-center justify-end gap-3">
                    <a href="{{ route('admin.ppdb.index') }}" class="px-5 py-2.5 bg-white hover:bg-slate-50 text-slate-600 font-bold rounded-xl border border-slate-200 text-xs transition">Batal</a>
                    <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl text-xs shadow-sm transition">Simpan Perubahan</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
