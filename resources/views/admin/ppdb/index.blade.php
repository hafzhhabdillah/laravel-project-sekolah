@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Header Halaman -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 px-4 sm:px-0">
                <div>
                    <h2 class="font-bold text-xl text-slate-800 leading-tight">
                        {{ __('Manajemen PPDB') }}
                    </h2>
                    <p class="text-xs text-slate-500 mt-0.5">Kelola data pendaftaran calon siswa baru sekolah.</p>
                </div>
            </div>

            <!-- Notifikasi Pesan Sukses -->
            @if (session('success'))
                <div
                    class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-2xl text-xs font-semibold flex items-center justify-between">
                    <span>{{ session('success') }}</span>
                    <button type="button" onclick="this.parentElement.remove()"
                        class="text-emerald-500 hover:text-emerald-700 font-bold">&times;</button>
                </div>
            @endif

            <!-- Card Tabel Utama -->
            <div class="bg-white shadow-xl shadow-slate-100 border border-slate-100 rounded-3xl overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row justify-between items-center gap-4">
                    <h3 class="font-bold text-slate-800 text-sm">Daftar Calon Siswa</h3>
                    <form action="{{ route('admin.ppdb.index') }}" method="GET" class="w-full sm:w-72">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari nama / asal sekolah..."
                            class="w-full rounded-2xl border-slate-200 focus:border-blue-500 text-xs py-2.5 px-4 bg-slate-50">
                    </form>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr
                                class="bg-slate-50/70 border-b border-slate-100 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                <th class="py-4 px-6">Calon Siswa</th>
                                <th class="py-4 px-6">Asal Sekolah</th>
                                <th class="py-4 px-6">Kontak Orang Tua</th>
                                <th class="py-4 px-6">Status</th>
                                <th class="py-4 px-6 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-xs text-slate-600">
                            @forelse($ppdbs as $item)
                                <tr class="hover:bg-slate-50/50 transition-colors" x-data="{ openDeleteModal: false }">
                                    <!-- 1. Kolom Calon Siswa -->
                                    <td class="py-4 px-6">
                                        <div class="font-bold text-slate-800">{{ $item->nama_lengkap }}</div>
                                        <div class="text-slate-400 text-[11px]">NISN: {{ $item->nisn ?? '-' }}</div>
                                    </td>

                                    <!-- 2. Kolom Asal Sekolah -->
                                    <td class="py-4 px-6">
                                        <div>{{ $item->asal_sekolah ?? '-' }}</div>
                                        <div class="text-slate-400 text-[11px]">Pilihan: {{ $item->jurusan_pilihan ?? '-' }}</div>
                                    </td>

                                    <!-- 3. Kolom Kontak Orang Tua -->
                                    <td class="py-4 px-6">
                                        <div>{{ $item->no_hp_ortu ?? '-' }}</div>
                                    </td>

                                    <!-- 4. Kolom Status -->
                                    <td class="py-4 px-6">
                                        @if($item->status == 'diterima')
                                            <span class="px-3 py-1 bg-emerald-50 text-emerald-600 rounded-full font-bold text-[10px]">Diterima</span>
                                        @elseif($item->status == 'ditolak')
                                            <span class="px-3 py-1 bg-rose-50 text-rose-600 rounded-full font-bold text-[10px]">Ditolak</span>
                                        @else
                                            <span class="px-3 py-1 bg-amber-50 text-amber-600 rounded-full font-bold text-[10px]">Pending</span>
                                        @endif
                                    </td>

                                    <!-- 5. Kolom Aksi (Detail, Edit, Hapus) -->
                                    <td class="py-4 px-6 text-right space-x-1">
                                        <!-- Tombol ke Halaman Detail -->
                                        <a href="{{ route('admin.ppdb.show', $item->id) }}"
                                            class="inline-block px-3 py-1.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-600 font-bold rounded-xl transition-all">Detail</a>

                                        <!-- Tombol Pindah ke Halaman Edit Terpisah -->
                                        <a href="{{ route('admin.ppdb.edit', $item->id) }}"
                                            class="inline-block px-3 py-1.5 bg-blue-50 hover:bg-blue-100 text-blue-600 font-bold rounded-xl transition-all">Edit</a>

                                        <!-- Tombol Trigger Modal Delete -->
                                        <button @click="openDeleteModal = true" type="button"
                                            class="px-3 py-1.5 bg-rose-50 hover:bg-rose-100 text-rose-600 font-bold rounded-xl transition-all">Hapus</button>

                                        <!-- MODAL DELETE -->
                                        <template x-teleport="body">
                                            <div x-show="openDeleteModal"
                                                class="fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4 sm:p-6"
                                                style="display: none;">
                                                <div @click.away="openDeleteModal = false"
                                                    class="bg-white rounded-3xl max-w-md w-full text-center p-6 shadow-2xl border border-slate-100 space-y-4">
                                                    <div
                                                        class="w-12 h-12 rounded-2xl bg-rose-100 text-rose-600 flex items-center justify-center mx-auto">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <h3 class="text-base font-bold text-slate-900">Hapus Data Pendaftar?
                                                        </h3>
                                                        <p class="text-xs text-slate-500 mt-1">
                                                            Apakah Anda yakin ingin menghapus data calon siswa <strong
                                                                class="text-slate-800">{{ $item->nama_lengkap }}</strong>?
                                                            Tindakan ini tidak dapat dibatalkan.
                                                        </p>
                                                    </div>
                                                    <div class="flex gap-3 pt-2">
                                                        <button @click="openDeleteModal = false" type="button"
                                                            class="w-1/2 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-2xl transition-all">Batal</button>
                                                        <form action="{{ route('admin.ppdb.destroy', $item->id) }}"
                                                            method="POST" class="w-1/2">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="w-full py-2.5 bg-rose-600 hover:bg-rose-700 text-white text-xs font-bold rounded-2xl transition-all shadow-xs">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-12 text-center">
                                        <div
                                            class="w-16 h-16 rounded-3xl bg-slate-100 text-slate-400 flex items-center justify-center mx-auto mb-3">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                            </svg>
                                        </div>
                                        <p class="text-sm font-bold text-slate-700">Belum Ada Data Pendaftar</p>
                                        <p class="text-xs text-slate-400 mt-1">Data pendaftaran calon siswa akan muncul di
                                            sini.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if (method_exists($ppdbs, 'hasPages') && $ppdbs->hasPages())
                    <div class="px-6 py-4 bg-slate-50 border-t border-slate-200/60">
                        {{ $ppdbs->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
@endsection
