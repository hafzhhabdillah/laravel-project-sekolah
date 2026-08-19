@extends('layouts.public')

@section('content')
<!-- HERO HEADER -->
<section class="relative bg-gradient-to-br from-blue-900 via-indigo-800 to-slate-900 text-white py-16 sm:py-20 overflow-hidden">
    <div class="absolute -top-24 -left-20 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -right-20 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-blue-500/20 text-blue-200 border border-blue-400/30 mb-4 backdrop-blur-md">
            <i class="bi bi-headset"></i> Layanan Informasi
        </span>
        <h1 class="text-3xl font-extrabold sm:text-5xl tracking-tight">Hubungi Kami</h1>
        <p class="mt-4 text-blue-100/90 max-w-2xl mx-auto text-sm sm:text-base leading-relaxed">
            Punya pertanyaan seputar pendaftaran, program keahlian, atau informasi sekolah? Tim kami siap membantu Anda.
        </p>
    </div>
</section>

<!-- MAIN CONTENT -->
<section class="py-12 sm:py-16 bg-slate-50/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

        <!-- CONTACT CARDS GRID -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">

            <!-- Card 1: Nama Sekolah -->
            <div class="bg-white p-7 rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300 shadow-sm">
                        <i class="bi bi-building"></i>
                    </div>
                    <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">Identitas Lembaga</span>
                    <h3 class="text-xl font-bold text-slate-900 mt-1 mb-2">Nama Sekolah</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        {{ $setting->school_name ?? 'SMK TARUNA BHAKTI DEPOK' }}
                    </p>
                </div>
            </div>

            <!-- Card 2: WhatsApp & Telepon -->
            <div class="bg-white p-7 rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300 shadow-sm">
                        <i class="bi bi-whatsapp"></i>
                    </div>
                    <span class="text-xs font-bold text-emerald-600 uppercase tracking-wider">Layanan Cepat</span>
                    <h3 class="text-xl font-bold text-slate-900 mt-1 mb-2">Telepon / WhatsApp</h3>
                    <p class="text-slate-600 text-sm mb-6">
                        {{ $setting->phone_number ?? '0811-9892-324' }}
                    </p>
                </div>

                @if(!empty($setting->phone_number))
                    @php
                        $waNumber = preg_replace('/[^0-9]/', '', $setting->phone_number);
                        if (str_starts_with($waNumber, '0')) {
                            $waNumber = '62' . substr($waNumber, 1);
                        }
                    @endphp
                    <a href="https://wa.me/{{ $waNumber }}" target="_blank"
                       class="inline-flex items-center justify-center gap-2 w-full py-3 px-4 bg-emerald-500 hover:bg-emerald-600 text-white font-semibold text-xs rounded-xl shadow-sm hover:shadow transition-all duration-200">
                        <i class="bi bi-whatsapp text-base"></i> Chat WhatsApp
                    </a>
                @endif
            </div>

            <!-- Card 3: Alamat Sekolah -->
            <div class="bg-white p-7 rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300 shadow-sm">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <span class="text-xs font-bold text-indigo-600 uppercase tracking-wider">Lokasi Kampus</span>
                    <h3 class="text-xl font-bold text-slate-900 mt-1 mb-2">Alamat Lengkap</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6">
                        {{ $setting->address ?? 'Jl. Pekapuran, RT.02/RW.06, Curug, Kec. Cimanggis, Kota Depok, Jawa Barat 16953' }}
                    </p>
                </div>

                <a href="{{ !empty($setting->maps_link) && !str_contains($setting->maps_link, '<iframe') ? $setting->maps_link : 'https://maps.google.com/?q=' . urlencode($setting->address ?? 'SMK Taruna Bhakti Depok') }}" target="_blank"
                   class="inline-flex items-center justify-center gap-2 w-full py-3 px-4 bg-slate-900 hover:bg-slate-800 text-white font-semibold text-xs rounded-xl shadow-sm hover:shadow transition-all duration-200">
                    <i class="bi bi-map text-base"></i> Buka di Google Maps
                </a>
            </div>

        </div>

        <!-- SECTION PETA GOOGLE MAPS -->
        <div class="bg-white p-4 sm:p-6 rounded-3xl border border-slate-200/80 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-2">
                    <i class="bi bi-geo-alt-fill text-indigo-600 text-lg"></i>
                    <h3 class="font-bold text-slate-800 text-base">Peta Lokasi Sekolah</h3>
                </div>
                <span class="text-xs font-medium text-slate-400 hidden sm:inline">
                    {{ $setting->school_name ?? 'SMK Taruna Bhakti Depok' }}
                </span>
            </div>

            <div class="w-full h-80 sm:h-96 rounded-2xl overflow-hidden relative bg-slate-100 border border-slate-200/60">
                @php
                    $mapsData = $setting->maps_link ?? '';
                    $embedUrl = null;

                    if (!empty($mapsData)) {
                        // 1. Jika database menyimpan tag <iframe> utuh
                        if (str_contains($mapsData, '<iframe')) {
                            preg_match('/src="([^"]+)"/', $mapsData, $matches);
                            $embedUrl = $matches[1] ?? null;
                        }
                        // 2. Jika database menyimpan link Google Maps Embed langsung
                        elseif (str_contains($mapsData, 'google.com/maps/embed')) {
                            $embedUrl = $mapsData;
                        }
                    }

                    // 3. Fallback: Generate embed URL otomatis dari nama/alamat sekolah
                    if (empty($embedUrl)) {
                        $searchQuery = urlencode(($setting->school_name ?? 'SMK Taruna Bhakti Depok') . ' ' . ($setting->address ?? 'Depok'));
                        $embedUrl = "https://maps.google.com/maps?q={$searchQuery}&t=&z=16&ie=UTF8&iwloc=&output=embed";
                    }
                @endphp

                <iframe
                    src="{{ $embedUrl }}"
                    class="w-full h-full border-0"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

    </div>
</section>
@endsection
