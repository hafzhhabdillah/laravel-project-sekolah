@extends('layouts.app')

@section('content')
    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 sm:p-10 rounded-[32px] shadow-xl shadow-slate-100/50 border border-slate-100 max-w-4xl mx-auto">
                <div class="mb-8 border-b border-slate-100 pb-6">
                    <h2 class="text-2xl font-bold text-slate-800">Formulir Pendaftaran PPDB</h2>
                    <p class="text-slate-500 text-sm mt-1">Lengkapi data diri Anda di bawah ini sesuai dengan dokumen asli.</p>
                </div>

                <form action="{{ route('user.ppdb.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- NISN -->
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">NISN</label>
                            <input type="number" name="nisn" class="w-full rounded-2xl border-slate-200 bg-slate-50 p-3.5 text-sm" required>
                        </div>

                        <!-- Nama Lengkap -->
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="w-full rounded-2xl border-slate-200 bg-slate-50 p-3.5 text-sm" required>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="w-full rounded-2xl border-slate-200 bg-slate-50 p-3.5 text-sm" required>
                                <option value="">-- Pilih --</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>

                        <!-- Tempat Lahir -->
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="w-full rounded-2xl border-slate-200 bg-slate-50 p-3.5 text-sm" required>
                        </div>

                        <!-- Tanggal Lahir -->
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="w-full rounded-2xl border-slate-200 bg-slate-50 p-3.5 text-sm" required>
                        </div>

                        <!-- Asal Sekolah -->
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Asal Sekolah</label>
                            <input type="text" name="asal_sekolah" class="w-full rounded-2xl border-slate-200 bg-slate-50 p-3.5 text-sm" required>
                        </div>

                        <!-- Jurusan -->
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Jurusan</label>
                            <select name="jurusan_pilihan" class="w-full rounded-2xl border-slate-200 bg-slate-50 p-3.5 text-sm" required>
                                <option value="">-- Pilih Jurusan --</option>
                                <option value="Rekayasa Perangkat Lunak (RPL)">RPL</option>
                                <option value="Teknik Komputer dan Jaringan (TKJ)">TKJ</option>
                                <option value="Multimedia (DKV)">Multimedia</option>
                            </select>
                        </div>

                        <!-- Nama Ayah -->
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Nama Ayah</label>
                            <input type="text" name="nama_ayah" class="w-full rounded-2xl border-slate-200 bg-slate-50 p-3.5 text-sm" required>
                        </div>

                        <!-- Nama Ibu (INI YANG TADI KETINGGALAN) -->
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Nama Ibu</label>
                            <input type="text" name="nama_ibu" class="w-full rounded-2xl border-slate-200 bg-slate-50 p-3.5 text-sm" required>
                        </div>

                        <!-- No HP Orang Tua -->
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">No. HP Orang Tua</label>
                            <input type="number" name="no_hp_ortu" class="w-full rounded-2xl border-slate-200 bg-slate-50 p-3.5 text-sm" required>
                        </div>

                        <!-- Alamat Lengkap -->
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Alamat Lengkap</label>
                            <textarea name="alamat" rows="2" class="w-full rounded-2xl border-slate-200 bg-slate-50 p-3.5 text-sm" required></textarea>
                        </div>
                    </div>

                    <div class="pt-8 border-t border-slate-100 flex justify-end">
                        <button type="submit" class="px-10 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl">Kirim Pendaftaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
