@extends('layouts.app')

@section('content')
<x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ __('Pengaturan Informasi Sekolah') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="bg-emerald-100 text-emerald-700 p-4 rounded-xl mb-6 text-sm font-semibold">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-6 sm:p-8 rounded-2xl border border-slate-100 shadow-sm">
            <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Nama Sekolah -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nama
                        Sekolah</label>
                    <input type="text" name="school_name" required
                        value="{{ old('school_name', $setting->school_name ?? '') }}"
                        class="w-full rounded-xl border border-slate-200 p-3 text-sm focus:border-blue-600 focus:ring-1 focus:ring-blue-600 outline-none transition-all">
                </div>

                <!-- Nomor Telepon / WA -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nomor Telepon /
                        WhatsApp</label>
                    <input type="text" name="phone_number"
                        value="{{ old('phone_number', $setting->phone_number ?? '') }}"
                        class="w-full rounded-xl border border-slate-200 p-3 text-sm focus:border-blue-600 focus:ring-1 focus:ring-blue-600 outline-none transition-all"
                        placeholder="Contoh: +62 812 3456 7890">
                </div>

                <!-- Alamat Sekolah -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Alamat
                        Lengkap</label>
                    <textarea name="address" rows="3"
                        class="w-full rounded-xl border border-slate-200 p-3 text-sm focus:border-blue-600 focus:ring-1 focus:ring-blue-600 outline-none transition-all"
                        placeholder="Masukkan alamat lengkap sekolah...">{{ old('address', $setting->address ?? '') }}</textarea>
                </div>

                <!-- Google Maps (Embed/Iframe) -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Embed Google Maps
                            (Iframe / SRC)</label>
                        <span class="text-xs text-slate-400">Paste kode &lt;iframe&gt; atau URL src-nya</span>
                    </div>

                    <input type="text" id="maps_input" name="maps_link"
                        value="{{ old('maps_link', $setting->maps_link ?? '') }}"
                        class="w-full rounded-xl border border-slate-200 p-3 text-sm focus:border-blue-600 focus:ring-1 focus:ring-blue-600 outline-none transition-all"
                        placeholder='<iframe src="https://www.google.com/maps/embed?..." ...></iframe>'
                        oninput="updateMapPreview(this.value)">

                    <!-- Panduan Cara Ambil Code Maps -->
                    <p class="text-[11px] text-slate-500 mt-2">
                        💡 <b>Petunjuk:</b> Buka Google Maps &rarr; Cari Lokasi Sekolah &rarr; Klik <b>Bagikan
                            (Share)</b> &rarr; Pilih tab <b>Sematkan peta (Embed a map)</b> &rarr; Klik <b>Salin
                            HTML</b> lalu paste di atas.
                    </p>

                    <!-- Preview Peta Live -->
                    <div class="mt-4">
                        <span class="block text-xs font-bold text-slate-500 mb-2">Preview Peta:</span>
                        <div id="maps_preview"
                            class="w-full h-56 bg-slate-100 rounded-xl overflow-hidden border border-slate-200 flex items-center justify-center text-slate-400 text-xs">
                            @if (!empty($setting->maps_link))
                                @if (str_contains($setting->maps_link, '<iframe'))
                                    {!! $setting->maps_link !!}
                                @else
                                    <iframe src="{{ $setting->maps_link }}" width="100%" height="100%"
                                        style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                @endif
                            @else
                                Peta belum diatur atau URL/Iframe tidak valid.
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Tombol Submit -->
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm px-6 py-3 rounded-xl shadow-md shadow-blue-500/20 transition-all">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('dashboard') }}" class="text-xs font-bold text-slate-500 hover:underline">
                        Kembali ke Dashboard
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Script Live Preview -->
    <script>
        function updateMapPreview(val) {
            const container = document.getElementById('maps_preview');
            if (!val.trim()) {
                container.innerHTML = 'Peta belum diatur atau URL/Iframe tidak valid.';
                return;
            }

            if (val.includes('<iframe')) {
                // Jika user melempar seluruh kode HTML <iframe>
                container.innerHTML = val;
                const iframe = container.querySelector('iframe');
                if (iframe) {
                    iframe.style.width = '100%';
                    iframe.style.height = '100%';
                    iframe.style.border = '0';
                }
            } else if (val.startsWith('http')) {
                // Jika user hanya menempelkan URL src-nya saja
                container.innerHTML =
                    `<iframe src="${val}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>`;
            } else {
                container.innerHTML = 'Format tidak dikenali. Masukkan tag &lt;iframe&gt; dari Google Maps.';
            }
        }

        // Auto responsive iframe pada preview saat pertama kali load
        window.addEventListener('DOMContentLoaded', () => {
            const iframe = document.querySelector('#maps_preview iframe');
            if (iframe) {
                iframe.style.width = '100%';
                iframe.style.height = '100%';
            }
        });
    </script>
@endsection
