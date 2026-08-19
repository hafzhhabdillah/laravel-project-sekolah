<nav x-data="{ open: false }" class="bg-white border-b border-slate-100 sticky top-0 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">

            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="flex items-center gap-3.5 group">
                    <div class="w-11 h-11 bg-blue-600 rounded-2xl flex items-center justify-center text-white shadow-md shadow-blue-500/25 group-hover:bg-blue-700 transition-all">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3z"/>
                            <path d="M5 13.18v4l7 3.82 7-3.82v-4L12 17l-7-3.82z"/>
                        </svg>
                    </div>
                    <span class="font-extrabold text-slate-900 text-lg tracking-tight">
                        SMK TARUNA BHAKTI DEPOK
                    </span>
                </a>
            </div>

            <!-- Menu Navigasi Desktop -->
            <div class="hidden md:flex items-center justify-center gap-8 text-sm font-semibold">
                {{-- DITAMBAHKAN request()->is('profile*') DI SINI --}}
                @if(request()->is('dashboard') || request()->is('admin*') || request()->is('users*') || request()->is('user*') || request()->is('profile*'))
                    <a href="{{ route('dashboard') }}"
                       class="{{ request()->routeIs('dashboard') ? 'text-blue-600 font-bold' : 'text-slate-500 hover:text-blue-600 transition-colors' }}">
                        Dashboard
                    </a>

                    @auth
                        @if(strtolower(Auth::user()->role ?? '') === 'admin')
                            <a href="{{ route('users.index') }}"
                               class="{{ request()->routeIs('users.*') ? 'text-blue-600 font-bold' : 'text-slate-500 hover:text-blue-600 transition-colors' }}">
                                Kelola User
                            </a>
                            <a href="{{ route('admin.gallery.index') }}"
                               class="{{ request()->routeIs('admin.gallery.*') ? 'text-blue-600 font-bold' : 'text-slate-500 hover:text-blue-600 transition-colors' }}">
                                Kelola Galeri
                            </a>
                            <a href="{{ route('admin.settings.edit') }}"
                               class="{{ request()->routeIs('admin.settings.*') ? 'text-blue-600 font-bold' : 'text-slate-500 hover:text-blue-600 transition-colors' }}">
                                Pengaturan Sekolah
                            </a>
                        @else
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
                    <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'text-blue-600 font-bold' : 'text-slate-500 hover:text-blue-600 transition-colors' }}">Home</a>
                    <a href="{{ url('/#about') }}" class="text-slate-500 hover:text-blue-600 transition-colors">About</a>
                    <a href="{{ url('/gallery') }}" class="{{ request()->is('gallery') ? 'text-blue-600 font-bold' : 'text-slate-500 hover:text-blue-600 transition-colors' }}">Gallery</a>
                    <a href="{{ url('/#contact') }}" class="text-slate-500 hover:text-blue-600 transition-colors">Contact</a>
                @endif
            </div>

            <!-- Profile Dropdown -->
            <div class="hidden md:flex md:items-center md:gap-3">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center gap-2.5 px-4 py-2 border border-slate-200 text-sm font-medium rounded-full text-slate-700 bg-white hover:bg-slate-50 focus:outline-none transition-all shadow-sm">
                                <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&color=2563EB&background=DBEAFE&bold=true' }}"
                                     alt="{{ Auth::user()->name }}" class="w-6 h-6 rounded-full object-cover">
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
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
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm px-7 py-3 rounded-2xl shadow-lg shadow-blue-500/30 transition-all">
                        Dashboard
                    </a>
                @endauth
            </div>

            <!-- Hamburger Button (Mobile) -->
            <div class="-me-2 flex items-center md:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-slate-400 hover:text-slate-600 hover:bg-slate-100 focus:outline-none transition-all">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'inline-flex': open, 'hidden': !open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile View) -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden border-t border-slate-100 bg-white">
        <div class="pt-2 pb-3 space-y-1 px-4">
            {{-- DITAMBAHKAN request()->is('profile*') DI SINI JUGA --}}
            @if(request()->is('dashboard') || request()->is('admin*') || request()->is('users*') || request()->is('user*') || request()->is('profile*'))
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>

                @auth
                    @if(strtolower(Auth::user()->role ?? '') === 'admin')
                        <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')">
                            {{ __('Kelola User') }}
                        </x-responsive-nav-link>

                        <x-responsive-nav-link :href="route('admin.gallery.index')" :active="request()->routeIs('admin.gallery.*')">
                            {{ __('Kelola Galeri') }}
                        </x-responsive-nav-link>

                        <x-responsive-nav-link :href="route('admin.settings.edit')" :active="request()->routeIs('admin.settings.*')">
                            {{ __('Pengaturan Sekolah') }}
                        </x-responsive-nav-link>
                    @else
                        <x-responsive-nav-link :href="route('user.gallery')" :active="request()->routeIs('user.gallery')">
                            {{ __('Galeri') }}
                        </x-responsive-nav-link>

                        <x-responsive-nav-link :href="route('user.info')" :active="request()->routeIs('user.info')">
                            {{ __('Informasi Sekolah') }}
                        </x-responsive-nav-link>
                    @endif
                @endauth
            @else
                <a href="{{ url('/') }}" class="block py-2 text-sm font-semibold text-slate-600 hover:text-blue-600">Home</a>
                <a href="{{ url('/#about') }}" class="block py-2 text-sm font-semibold text-slate-600 hover:text-blue-600">About</a>
                <a href="{{ url('/gallery') }}" class="block py-2 text-sm font-semibold text-blue-600">Gallery</a>
                <a href="{{ url('/#contact') }}" class="block py-2 text-sm font-semibold text-slate-600 hover:text-blue-600">Contact</a>
            @endif
        </div>

        <div class="pt-4 pb-3 border-t border-slate-100 px-4">
            @auth
                <div class="flex items-center gap-3 mb-3">
                    <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}" class="w-9 h-9 rounded-full object-cover">
                    <div>
                        <div class="font-bold text-sm text-slate-800">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-slate-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="space-y-1">
                    <x-responsive-nav-link :href="url('/')">
                        {{ __('Lihat Web Publik') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <div class="space-y-2 py-2">
                    <a href="{{ route('login') }}" class="block text-center text-sm font-semibold text-slate-600 border border-slate-200 py-2 rounded-xl">Masuk</a>
                    <a href="{{ route('register') }}" class="block text-center text-sm font-semibold bg-blue-600 text-white py-2 rounded-xl">Daftar</a>
                </div>
            @endauth
        </div>
    </div>
</nav>
