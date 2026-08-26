@extends('layouts.app')

@section('content')
<div class="py-10 bg-slate-50 min-h-screen" x-data="{ openModal: false, activeImage: '', activeTitle: '' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            <!-- Card Header Simpel -->
            <div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm">
                <h1 class="text-2xl font-bold text-slate-900 tracking-tight">
                    Galeri Kegiatan Sekolah
                </h1>
                <p class="text-slate-500 text-sm mt-1">
                    Klik pada foto untuk melihat ukuran penuh dan deskripsi lengkap kegiatan.
                </p>
            </div>

            <!-- Grid Card Galeri -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse($galleries ?? [] as $item)
                    <div class="bg-white rounded-3xl border border-slate-100 overflow-hidden shadow-sm hover:shadow-md transition-all group">

                        <!-- Area Foto dengan Hover Button -->
                        <div class="relative aspect-[3/4] overflow-hidden bg-slate-100">
                            <img src="{{ asset('storage/' . $item->image) }}"
                                 alt="{{ $item->title }}"
                                 class="w-full h-full object-cover">

                            <!-- Overlay Shadow Gradient di Bawah -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-90"></div>

                            <!-- Tombol Perbesar Foto -->
                            <div class="absolute bottom-4 left-4">
                                <button @click="openModal = true; activeImage = '{{ asset('storage/' . $item->image) }}'; activeTitle = '{{ $item->title }}'"
                                        class="inline-flex items-center gap-2 bg-slate-900/80 hover:bg-black text-white text-xs font-semibold px-4 py-2.5 rounded-xl backdrop-blur-md transition-all shadow-md">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                    </svg>
                                    Perbesar Foto
                                </button>
                            </div>
                        </div>

                        <!-- Judul Kegiatan -->
                        <div class="p-5 bg-white">
                            <h3 class="font-bold text-blue-600 text-sm hover:text-blue-700 transition-colors">
                                {{ $item->title }}
                            </h3>
                        </div>
                    </div>
                @empty
                    <!-- Dummy Card Jika Data Kosong -->
                    <div class="bg-white rounded-3xl border border-slate-100 overflow-hidden shadow-sm hover:shadow-md transition-all group max-w-xs">
                        <div class="relative aspect-[3/4] overflow-hidden bg-slate-100">
                            <img src="https://images.unsplash.com/photo-1546519638-68e109498ffc?q=80&w=800"
                                 alt="Ekstrakurikuler Basket"
                                 class="w-full h-full object-cover">

                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-90"></div>

                            <div class="absolute bottom-4 left-4">
                                <button @click="openModal = true; activeImage = 'https://images.unsplash.com/photo-1546519638-68e109498ffc?q=80&w=800'; activeTitle = 'Ekstrakurikuler Basket'"
                                        class="inline-flex items-center gap-2 bg-slate-900/80 hover:bg-black text-white text-xs font-semibold px-4 py-2.5 rounded-xl backdrop-blur-md transition-all shadow-md">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                    </svg>
                                    Perbesar Foto
                                </button>
                            </div>
                        </div>

                        <div class="p-5 bg-white">
                            <h3 class="font-bold text-blue-600 text-sm hover:text-blue-700 transition-colors">
                                Ekstrakurikuler Basket
                            </h3>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>

        <!-- Modal Lightbox Presisi Tengah (Sesuai Gambar) -->
        <div x-show="openModal"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/70 backdrop-blur-sm"
             style="display: none;"
             @keydown.escape.window="openModal = false">

            <!-- Card Container Modal -->
            <div class="bg-slate-900 rounded-3xl max-w-xl w-full overflow-hidden shadow-2xl border border-slate-800 flex flex-col items-center"
                 @click.away="openModal = false">

                <!-- Header Putih Modal -->
                <div class="w-full bg-white px-6 py-4 flex items-center justify-between border-b border-slate-100">
                    <h2 x-text="activeTitle" class="text-slate-900 font-bold text-sm tracking-tight"></h2>
                    <button @click="openModal = false" class="text-slate-400 hover:text-slate-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Body Modal (Foto Tengah) -->
                <div class="p-6 flex items-center justify-center w-full">
                    <img :src="activeImage" :alt="activeTitle" class="rounded-2xl max-h-[70vh] w-auto object-contain shadow-lg">
                </div>

            </div>
        </div>

    </div>
@endsection
