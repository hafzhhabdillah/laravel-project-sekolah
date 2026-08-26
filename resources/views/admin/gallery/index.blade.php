@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-blue-50 text-blue-600 border border-blue-100 uppercase tracking-wider">Modul Galeri</span>
                </div>
                <h2 class="font-black text-2xl text-slate-900 tracking-tight">Kelola Galeri Sekolah</h2>
                <p class="text-xs text-slate-500">Kelola dokumentasi visual kegiatan siswa dan staf yang akan dipublikasikan.</p>
            </div>

            <a href="{{ route('admin.gallery.create') }}" class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 active:scale-[0.98] text-white text-xs px-5 py-2.5 rounded-2xl font-bold shadow-lg shadow-blue-500/25 transition-all">
                <i class="bi bi-cloud-arrow-up-fill text-sm"></i>
                <span>Upload Foto Baru</span>
            </a>
        </div>
    </x-slot>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="py-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        <!-- ALERT SUCCESS -->
        @if(session('success'))
            <div class="bg-emerald-500 text-white p-4 rounded-2xl shadow-lg shadow-emerald-500/20 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-white/20 flex items-center justify-center">
                        <i class="bi bi-check-lg text-lg"></i>
                    </div>
                    <span class="text-xs font-bold">{{ session('success') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-white/80 hover:text-white"><i class="bi bi-x-lg"></i></button>
            </div>
        @endif

        <!-- STATS BAR -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="bg-white p-5 rounded-3xl border border-slate-200/80 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl font-bold">
                    <i class="bi bi-images"></i>
                </div>
                <div>
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Foto</p>
                    <h4 class="text-xl font-extrabold text-slate-800">{{ $galleries->count() }} Item</h4>
                </div>
            </div>

            <div class="bg-white p-5 rounded-3xl border border-slate-200/80 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl font-bold">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div>
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Status Publikasi</p>
                    <h4 class="text-xl font-extrabold text-slate-800">Aktif & Tampil</h4>
                </div>
            </div>

            <div class="bg-white p-5 rounded-3xl border border-slate-200/80 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-xl font-bold">
                    <i class="bi bi-aspect-ratio"></i>
                </div>
                <div>
                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Kualitas Gambar</p>
                    <h4 class="text-xl font-extrabold text-slate-800">HD / Optimized</h4>
                </div>
            </div>
        </div>

        <!-- MAIN GALLERY GRID CARD -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($galleries as $item)
                <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col overflow-hidden group">

                    <!-- Image Wrapper -->
                    <div class="relative aspect-[16/10] w-full bg-slate-900 overflow-hidden">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 opacity-95 group-hover:opacity-100">

                        <!-- Top Floating Badge -->
                        <div class="absolute top-3 left-3 z-10">
                            <span class="px-2.5 py-1 rounded-xl text-[10px] font-bold bg-slate-900/60 text-white backdrop-blur-md border border-white/10 shadow-sm">
                                #{{ $loop->iteration }}
                            </span>
                        </div>

                        <!-- Hover Overlay Actions -->
                        <div class="absolute inset-0 bg-slate-950/60 backdrop-blur-[2px] opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center gap-2 p-4">
                            <a href="{{ route('admin.gallery.edit', $item->id) }}" class="inline-flex items-center gap-1.5 bg-white text-slate-900 hover:bg-blue-600 hover:text-white font-bold text-xs px-4 py-2.5 rounded-xl shadow-lg transition-all">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>

                            <form id="delete-form-{{ $item->id }}" action="{{ route('admin.gallery.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete({{ $item->id }})" class="inline-flex items-center gap-1.5 bg-red-500/90 hover:bg-red-600 text-white font-bold text-xs px-4 py-2.5 rounded-xl shadow-lg transition-all backdrop-blur-md">
                                    <i class="bi bi-trash-fill"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Content Details -->
                    <div class="p-5 flex-1 flex flex-col justify-between bg-white">
                        <div>
                            <h3 class="font-extrabold text-slate-800 text-base mb-1 group-hover:text-blue-600 transition-colors line-clamp-1">
                                {{ $item->title }}
                            </h3>
                            <p class="text-slate-500 text-xs leading-relaxed line-clamp-2">
                                {{ $item->description ?? 'Tidak ada deskripsi tertulis untuk dokumen galeri ini.' }}
                            </p>
                        </div>

                        <!-- Mobile Action Buttons (Visible only on small screens) -->
                        <div class="pt-4 mt-4 border-t border-slate-100 flex sm:hidden items-center justify-end gap-2">
                            <a href="{{ route('admin.gallery.edit', $item->id) }}" class="text-blue-600 bg-blue-50 px-3 py-1.5 rounded-lg text-xs font-bold">Edit</a>
                            <button onclick="confirmDelete({{ $item->id }})" class="text-red-600 bg-red-50 px-3 py-1.5 rounded-lg text-xs font-bold">Hapus</button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-white rounded-3xl border border-slate-200/80 p-16 text-center shadow-sm">
                    <div class="w-20 h-20 bg-slate-100 text-slate-400 rounded-3xl flex items-center justify-center text-3xl mx-auto mb-4 border border-slate-200">
                        <i class="bi bi-images"></i>
                    </div>
                    <h3 class="font-extrabold text-slate-800 text-lg mb-1">Belum Ada Foto</h3>
                    <p class="text-xs text-slate-400 max-w-sm mx-auto mb-6">Mulai isi galeri kegiatan sekolah untuk menampilkan dokumentasi terbaik.</p>
                    <a href="{{ route('admin.gallery.create') }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-xs px-6 py-3 rounded-2xl font-bold transition-all shadow-md">
                        <i class="bi bi-plus-lg"></i>
                        Upload Foto Pertama
                    </a>
                </div>
            @endforelse
        </div>

        @if($galleries->hasPages())
            <div class="pt-4">
                {{ $galleries->links() }}
            </div>
        @endif
    </div>

    <!-- SweetAlert2 Script -->
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Hapus Foto Ini?',
                text: "Foto yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',
                customClass: {
                    popup: 'rounded-3xl',
                    confirmButton: 'rounded-xl px-4 py-2.5 font-semibold text-xs',
                    cancelButton: 'rounded-xl px-4 py-2.5 font-semibold text-xs'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endsection
