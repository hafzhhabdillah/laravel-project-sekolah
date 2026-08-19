<!-- Card Dokumentasi Kegiatan -->
<div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-between">
    <div>
        <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-4">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </div>
        <h3 class="font-bold text-slate-800 text-base">Dokumentasi Kegiatan</h3>
        <p class="text-slate-500 text-xs mt-1">Lihat koleksi foto event sekolah, ekstrakurikuler, dan kegiatan pembelajaran.</p>
    </div>
    <div class="mt-6 pt-4 border-t border-slate-100 flex justify-between items-center">
        <span class="text-xs text-slate-400 font-medium">Album Foto</span>
        <!-- UBAH BAGIAN IKI (panggil route user.gallery) -->
        <a href="{{ route('user.gallery') }}" class="text-xs font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1 transition-all">
            Lihat Galeri &rarr;
        </a>
    </div>
</div>

<!-- Card Informasi & Lokasi -->
<div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-between">
    <div>
        <div class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center mb-4">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 25">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
            </svg>
        </div>
        <h3 class="font-bold text-slate-800 text-base">Informasi & Lokasi</h3>
        <p class="text-slate-500 text-xs mt-1">Cek alamat lengkap sekolah, kontak panitia/layanan, dan petunjuk peta Google Maps.</p>
    </div>
    <div class="mt-6 pt-4 border-t border-slate-100 flex justify-between items-center">
        <span class="text-xs text-slate-400 font-medium">Kontak & Map</span>
        <!-- UBAH BAGIAN IKI (panggil route user.info) -->
        <a href="{{ route('user.info') }}" class="text-xs font-bold text-emerald-600 hover:text-emerald-700 flex items-center gap-1 transition-all">
            Lihat Info &rarr;
        </a>
    </div>
</div>
