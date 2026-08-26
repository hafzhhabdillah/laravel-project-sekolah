<x-guest-layout>
    <!-- Header Logo & Title -->
    <div class="mb-8 text-center">
        <div class="w-14 h-14 bg-gradient-to-tr from-blue-600 to-indigo-500 text-white rounded-2xl flex items-center justify-center mx-auto mb-3 text-2xl shadow-lg shadow-blue-500/30 transition-transform duration-300 hover:scale-110 hover:rotate-3">
            <i class="bi bi-shield-lock-fill"></i>
        </div>
        <h2 class="text-2xl font-bold text-slate-900 tracking-tight">Selamat Datang!</h2>
        <p class="text-xs text-slate-500 mt-1">Masuk untuk mengakses portal akun kamu</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Role Select Options -->
        <div class="group">
            <label for="role" class="block font-semibold text-slate-700 text-xs mb-1.5 transition-colors group-focus-within:text-blue-600">Masuk Sebagai</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-600 transition-colors">
                    <i class="bi bi-person-badge-fill"></i>
                </div>
                <select id="role" name="role" required class="w-full rounded-2xl border-slate-200 focus:border-blue-600 focus:ring-4 focus:ring-blue-100 text-sm py-2.5 pl-10 pr-3.5 bg-slate-50/50 focus:bg-white transition-all duration-300 text-slate-700">
                    <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrator</option>
                </select>
            </div>
            <x-input-error :messages="$errors->get('role')" class="mt-1.5 text-xs" />
        </div>

        <!-- Email Address -->
        <div class="group">
            <label for="email" class="block font-semibold text-slate-700 text-xs mb-1.5 transition-colors group-focus-within:text-blue-600">Email Sekolah</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-600 transition-colors">
                    <i class="bi bi-envelope-fill"></i>
                </div>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="nama@sekolah.sch.id"
                    class="w-full rounded-2xl border-slate-200 focus:border-blue-600 focus:ring-4 focus:ring-blue-100 text-sm py-2.5 pl-10 pr-3.5 bg-slate-50/50 focus:bg-white transition-all duration-300" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-xs" />
        </div>

        <!-- Password (dengan Toggle & Icon) -->
        <div x-data="{ show: false }" class="group">
            <div class="flex items-center justify-between mb-1.5">
                <label for="password" class="block font-semibold text-slate-700 text-xs transition-colors group-focus-within:text-blue-600">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-xs text-blue-600 hover:text-blue-800 font-semibold transition-colors" href="{{ route('password.request') }}">
                        Lupa Password?
                    </a>
                @endif
            </div>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-600 transition-colors">
                    <i class="bi bi-key-fill"></i>
                </div>
                <input id="password" :type="show ? 'text' : 'password'" name="password" required autocomplete="current-password" placeholder="••••••••"
                    class="w-full rounded-2xl border-slate-200 focus:border-blue-600 focus:ring-4 focus:ring-blue-100 text-sm py-2.5 pl-10 pr-10 bg-slate-50/50 focus:bg-white transition-all duration-300" />

                <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600 focus:outline-none transition-colors">
                    <i class="bi text-base" :class="show ? 'bi-eye-slash-fill text-blue-600' : 'bi-eye-fill'"></i>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-1.5 text-xs" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center pt-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox" class="rounded-md border-slate-300 text-blue-600 focus:ring-blue-500 h-4 w-4 transition-all" name="remember">
                <span class="ms-2 text-xs text-slate-600 group-hover:text-slate-800 transition-colors">Ingat Saya di perangkat ini</span>
            </label>
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold py-3 rounded-2xl shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 active:scale-[0.98] transition-all duration-200 text-sm flex items-center justify-center gap-2">
                <span>Masuk Sekarang</span>
                <i class="bi bi-arrow-right text-base"></i>
            </button>
        </div>
    </form>
</x-guest-layout>
