@extends('layouts.public')

@section('content')
<!-- HERO HEADER -->
<section class="relative bg-gradient-to-br from-blue-900 via-indigo-800 to-slate-900 text-white py-16 sm:py-20 overflow-hidden">
    <div class="absolute -top-24 -left-20 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -right-20 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-blue-500/20 text-blue-200 border border-blue-400/30 mb-4 backdrop-blur-md">
            <i class="bi bi-images"></i> Dokumentasi
        </span>
        <h1 class="text-3xl font-extrabold sm:text-5xl tracking-tight">Galeri Kegiatan Sekolah</h1>
        <p class="mt-4 text-blue-100/90 max-w-2xl mx-auto text-sm sm:text-base leading-relaxed">
            Momen-momen berharga dan kebersamaan seluruh aktivitas siswa serta staf sekolah. Klik foto untuk melihat lebih jelas.
        </p>
    </div>
</section>

<!-- MAIN CONTENT -->
<section class="py-12 sm:py-16 bg-slate-50/60 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

        <!-- GRID GALERI -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($galleries as $item)
                <div class="bg-white rounded-3xl border border-slate-200/80 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 group flex flex-col justify-between">

                    <!-- Container Foto & Overlay (Diperbaiki agar tidak terpotong) -->
                    <div class="relative aspect-[4/3] w-full overflow-hidden bg-slate-100">
                        <img src="{{ asset('storage/' . $item->image) }}"
                             alt="{{ $item->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">

                        <!-- Overlay Gradient & Tombol -->
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end p-4">
                            <button onclick="openLightbox('{{ asset('storage/' . $item->image) }}', '{{ addslashes($item->title) }}', '{{ addslashes($item->description ?? '') }}')"
                                    class="inline-flex items-center justify-center gap-2 bg-white/90 hover:bg-white text-slate-900 text-xs font-bold px-4 py-2.5 rounded-xl backdrop-blur-md transition-all shadow-md w-full">
                                <i class="bi bi-zoom-in text-sm"></i> Perbesar Foto
                            </button>
                        </div>
                    </div>

                    <!-- Judul Card -->
                    <div class="p-5 bg-white flex-1 flex items-center justify-between">
                        <h4 class="font-bold text-slate-800 text-sm group-hover:text-blue-600 transition-colors line-clamp-1">
                            {{ $item->title }}
                        </h4>
                        <button onclick="openLightbox('{{ asset('storage/' . $item->image) }}', '{{ addslashes($item->title) }}', '{{ addslashes($item->description ?? '') }}')"
                                class="text-slate-400 hover:text-blue-600 sm:hidden">
                            <i class="bi bi-arrows-angle-expand"></i>
                        </button>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-white p-12 rounded-3xl border border-slate-200/80 text-center shadow-sm">
                    <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-2xl flex items-center justify-center text-2xl mx-auto mb-4">
                        <i class="bi bi-image-fill"></i>
                    </div>
                    <h3 class="font-bold text-slate-700 text-base mb-1">Galeri Kosong</h3>
                    <p class="text-sm text-slate-400">Belum ada dokumentasi foto yang dipublikasikan.</p>
                </div>
            @endforelse
        </div>

        <!-- PAGINATION -->
        @if(method_exists($galleries, 'links'))
            <div class="pt-4 flex justify-center">
                {{ $galleries->links() }}
            </div>
        @endif
    </div>
</section>

<!-- LIGHTBOX MODAL -->
<div id="lightboxModal" onclick="closeLightbox()" class="fixed inset-0 z-50 hidden bg-slate-950/80 backdrop-blur-md items-center justify-center p-4 transition-all duration-300">
    <div id="lightboxContainer" onclick="event.stopPropagation()" class="relative max-w-3xl w-full bg-slate-900 rounded-3xl overflow-hidden shadow-2xl border border-slate-800 transform scale-95 opacity-0 transition-all duration-300 flex flex-col items-center">

        <!-- Header Modal -->
        <div class="w-full bg-white px-6 py-4 flex items-center justify-between border-b border-slate-100">
            <h3 id="lightboxTitle" class="font-bold text-slate-900 text-sm tracking-tight truncate pr-4"></h3>
            <button onclick="closeLightbox()" class="text-slate-400 hover:text-slate-600 transition-colors p-1">
                <i class="bi bi-x-lg text-base"></i>
            </button>
        </div>

        <!-- Body Modal -->
        <div class="p-6 flex items-center justify-center w-full bg-slate-950">
            <img id="lightboxImage" src="" class="rounded-2xl max-h-[70vh] w-auto object-contain shadow-lg">
        </div>

        <!-- Deskripsi Modal -->
        <div id="lightboxDescBox" class="w-full px-6 py-4 bg-slate-900 text-center border-t border-slate-800 hidden">
            <p id="lightboxDesc" class="text-xs text-slate-300 leading-relaxed"></p>
        </div>
    </div>
</div>

<script>
    function openLightbox(src, title, desc) {
        const modal = document.getElementById('lightboxModal');
        const container = document.getElementById('lightboxContainer');
        const img = document.getElementById('lightboxImage');
        const titleEl = document.getElementById('lightboxTitle');
        const descEl = document.getElementById('lightboxDesc');
        const descBox = document.getElementById('lightboxDescBox');

        img.src = src;
        titleEl.textContent = title;

        if (desc && desc.trim() !== '') {
            descEl.textContent = desc;
            descBox.classList.remove('hidden');
        } else {
            descBox.classList.add('hidden');
        }

        modal.classList.remove('hidden');
        modal.classList.add('flex');

        setTimeout(() => {
            container.classList.remove('scale-95', 'opacity-0');
            container.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeLightbox() {
        const modal = document.getElementById('lightboxModal');
        const container = document.getElementById('lightboxContainer');

        container.classList.remove('scale-100', 'opacity-100');
        container.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }, 200);
    }
</script>
@endsection
