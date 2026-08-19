@extends('layouts.public')

@section('content')
<!-- HERO HEADER -->
<section class="relative bg-gradient-to-br from-blue-900 via-indigo-800 to-slate-900 text-white py-16 sm:py-20 overflow-hidden">
    <div class="absolute -top-24 -left-20 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -right-20 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-blue-500/20 text-blue-200 border border-blue-400/30 mb-4 backdrop-blur-md">
            <i class="bi bi-info-circle"></i> Profile Sekolah
        </span>
        <h1 class="text-3xl font-extrabold sm:text-5xl tracking-tight">Tentang {{ $setting->school_name ?? 'Sekolah Kami' }}</h1>
        <p class="mt-4 text-blue-100/90 max-w-2xl mx-auto text-sm sm:text-base leading-relaxed">
            Mengenal lebih dekat visi, misi, dan komitmen utama kami dalam mendidik generasi unggul dan berkarakter.
        </p>
    </div>
</section>

<!-- MAIN CONTENT -->
<section class="py-12 sm:py-16 bg-slate-50/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">

        <!-- PROFIL & VISI MISI GRID -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">

            <!-- Profil Ringkas -->
            <div class="bg-white p-8 sm:p-10 rounded-3xl border border-slate-200/80 shadow-sm flex flex-col justify-between">
                <div>
                    <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">Komitmen Pendidikan</span>
                    <h2 class="text-2xl font-bold text-slate-900 mt-1 mb-4">Memberikan Layanan Pendidikan Terbaik</h2>
                    <div class="space-y-4 text-slate-600 text-sm sm:text-base leading-relaxed">
                        <p>
                            <strong>{{ $setting->school_name ?? 'Sekolah kami' }}</strong> berdedikasi untuk menciptakan lingkungan belajar yang inspiratif, inklusif, dan adaptif terhadap perkembangan teknologi modern.
                        </p>
                        <p>
                            Melalui kurikulum terpadu dan pembinaan karakter yang kuat, kami membekali peserta didik dengan keterampilan relevan agar siap bersaing di tingkat nasional maupun internasional.
                        </p>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-slate-100 flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center text-xl font-bold">
                        <i class="bi bi-award"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Pendidikan Berkarakter</h4>
                        <p class="text-xs text-slate-500">Mencetak generasi cerdas, mandiri, dan berakhlak mulia.</p>
                    </div>
                </div>
            </div>

            <!-- Visi & Misi Card -->
            <div class="bg-gradient-to-br from-slate-900 to-indigo-950 text-white p-8 sm:p-10 rounded-3xl border border-slate-800 shadow-lg flex flex-col justify-between relative overflow-hidden">
                <div class="absolute top-0 right-0 -mt-8 -mr-8 w-40 h-40 bg-blue-500/10 rounded-full blur-2xl pointer-events-none"></div>

                <div class="relative z-10 space-y-6">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-500/20 text-blue-300 rounded-xl flex items-center justify-center text-lg border border-blue-400/20">
                            <i class="bi bi-compass"></i>
                        </div>
                        <h3 class="text-xl font-bold">Visi & Misi</h3>
                    </div>

                    <div class="space-y-3">
                        <span class="text-xs font-bold text-blue-400 uppercase tracking-wider">Visi Utama</span>
                        <p class="text-slate-200 text-sm leading-relaxed bg-white/5 p-4 rounded-2xl border border-white/10">
                            Menjadi lembaga pendidikan unggul yang menghasilkan lulusan berakhlak mulia, cerdas, dan kompeten di bidangnya.
                        </p>
                    </div>

                    <div class="space-y-3">
                        <span class="text-xs font-bold text-indigo-400 uppercase tracking-wider">Misi Strategis</span>
                        <p class="text-slate-200 text-sm leading-relaxed bg-white/5 p-4 rounded-2xl border border-white/10">
                            Menyelenggarakan pembelajaran berkualitas berbasis teknologi, membina karakter peserta didik, serta menjalin kerja sama erat dengan dunia industri.
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
@endsection
