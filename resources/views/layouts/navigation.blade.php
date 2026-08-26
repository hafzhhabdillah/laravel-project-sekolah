<nav x-data="{ open: false }" class="bg-white border-b border-slate-100 sticky top-0 z-40 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">

            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="flex items-center gap-3.5 group">
                    <div class="w-11 h-11 bg-blue-600 rounded-2xl flex items-center justify-center text-white shadow-md shadow-blue-500/25 group-hover:bg-blue-700 transition-all">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3z" />
                            <path d="M5 13.18v4l7 3.82 7-3.82v-4L12 17l-7-3.82z" />
                        </svg>
                    </div>
                    <span class="font-extrabold text-slate-900 text-lg tracking-tight">
                        {{ $setting->school_name ?? 'SMK TARUNA BHAKTI DEPOK' }}
                    </span>
                </a>
            </div>

            <!-- Menu Navigasi Desktop -->
            <div class="hidden md:flex items-center justify-center gap-8 text-sm font-semibold">
                @if (request()->is('dashboard') ||
                        request()->is('admin*') ||
                        request()->is('users*') ||
                        request()->is('user*') ||
                        request()->is('profile*') ||
                        request()->is('ppdb*'))

                    <!-- Menu khusus halaman Admin / Panel Dashboard -->
                    <a href="{{ route('dashboard') }}"
                        class="{{ request()->routeIs('dashboard') ? 'text-blue-600 font-bold' : 'text-slate-500 hover:text-blue-600 transition-colors' }}">
                        Dashboard
                    </a>

                    @auth
                        @php
                            $role = strtolower(Auth::user()->role ?? '');
                        @endphp

                        @if (in_array($role, ['admin', 'guru']))
                            <!-- Menu Admin & Guru -->
                            <a href="{{ route('users.index') }}"
                                class="{{ request()->routeIs('users.*') ? 'text-blue-600 font-bold' : 'text-slate-500 hover:text-blue-600 transition-colors' }}">
                                Daftarkan Anggota
                            </a>
                            <a href="{{ route('admin.ppdb.index') }}"
                                class="{{ request()->routeIs('admin.ppdb.*') ? 'text-blue-600 font-bold' : 'text-slate-500 hover:text-blue-600 transition-colors' }}">
                                Management PPDB
                            </a>
                            <a href="{{ route('admin.gallery.index') }}"
                                class="{{ request()->routeIs('admin.gallery.*') ? 'text-blue-600 font-bold' : 'text-slate-500 hover:text-blue-600 transition-colors' }}">
                                Kelola Galeri
                            </a>
                            <a href="{{ route('admin.settings.edit') }}"
                                class="{{ request()->routeIs('admin.settings.*') ? 'text-blue-600 font-bold' : 'text-slate-500 hover:text-blue-600' }} transition-colors">
                                Pengaturan
                            </a>
                        @else
                            <!-- Menu User / Murid -->
                            <a href="{{ route('user.ppdb.index') }}"
                                class="{{ request()->routeIs('user.ppdb.*') ? 'text-blue-600 font-bold' : 'text-slate-500 hover:text-blue-600 transition-colors' }}">
                                Pendaftaran PPDB
                            </a>
                            <a href="{{ route('user.gallery') }}"
                                class="{{ request()->routeIs('user.gallery') ? 'text-blue-600 font-bold' : 'text-slate-500 hover:text-blue-600 transition-colors' }}">
                                Galeri
                            </a>
                            <a href="{{ route('user.info') }}"
                                class="{{ request()->routeIs('user.info') ? 'text-blue-600 font-bold' : 'text-slate-500 hover:text-blue-600 transition-colors' }}">
                                Informasi Sekolah
                            </a>
                        @endif
                    @endauth
                @else
                    <!-- Menu Halaman Publik (Home, About, dll) -->
                    <a href="{{ route('home') }}"
                        class="{{ request()->routeIs('home') ? 'text-blue-600 font-bold' : 'text-slate-500 hover:text-blue-600 transition-colors' }}">Home</a>
                    <a href="{{ route('about') }}"
                        class="{{ request()->routeIs('about') ? 'text-blue-600 font-bold' : 'text-slate-500 hover:text-blue-600 transition-colors' }}">About</a>
                    <a href="{{ route('gallery') }}"
                        class="{{ request()->routeIs('gallery') ? 'text-blue-600 font-bold' : 'text-slate-500 hover:text-blue-600 transition-colors' }}">Gallery</a>
                    <a href="{{ route('contact') }}"
                        class="{{ request()->routeIs('contact') ? 'text-blue-600 font-bold' : 'text-slate-500 hover:text-blue-600 transition-colors' }}">Contact</a>

                    <!-- Tombol Dashboard jika user sudah login saat di halaman publik -->
                    @auth
                        <a href="{{ route('dashboard') }}" class="px-3.5 py-1.5 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-xl transition-all">
                            Dashboard
                        </a>
                    @endauth
                @endif
            </div>

            <!-- Profile Dropdown / Login Button -->
            <div class="hidden md:flex md:items-center md:gap-3">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center gap-2.5 px-4 py-2 border border-slate-200 text-sm font-medium rounded-full text-slate-700 bg-white hover:bg-slate-50 focus:outline-none transition-all shadow-sm">
                                <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&color=2563EB&background=DBEAFE&bold=true' }}"
                                    alt="{{ Auth::user()->name }}" class="w-6 h-6 rounded-full object-cover">
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="url('/')">
                                {{ __('Lihat Web Publik') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('dashboard')">
                                {{ __('Dashboard') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm px-6 py-2.5 rounded-xl shadow-md shadow-blue-500/20 transition-all">
                        Masuk
                    </a>
                @endauth
            </div>

            <!-- Hamburger Button (Mobile) -->
            <div class="-me-2 flex items-center md:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-xl text-slate-400 hover:text-slate-600 hover:bg-slate-100 focus:outline-none transition-all">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'inline-flex': open, 'hidden': !open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>
