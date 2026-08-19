<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-slate-900">Buat Akun Baru</h2>
        <p class="text-xs text-slate-500 mt-1">Lengkapi data untuk pendaftaran portal</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-3.5">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block font-semibold text-slate-700 text-xs mb-1">Nama Lengkap</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="John Doe"
                class="w-full rounded-xl border border-slate-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 text-sm py-2.5 px-3.5 bg-slate-50 focus:bg-white transition-all outline-none" />
            <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs text-red-500" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block font-semibold text-slate-700 text-xs mb-1">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="nama@email.com"
                class="w-full rounded-xl border border-slate-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 text-sm py-2.5 px-3.5 bg-slate-50 focus:bg-white transition-all outline-none" />
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-500" />
        </div>

        <!-- Role Select (Baru) -->
        <div>
            <label for="role" class="block font-semibold text-slate-700 text-xs mb-1">Daftar Sebagai</label>
            <select id="role" name="role" required
                class="w-full rounded-xl border border-slate-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 text-sm py-2.5 px-3.5 bg-slate-50 focus:bg-white transition-all outline-none">
                <option value="" disabled selected>-- Pilih Peran --</option>
                <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>Guru</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-1 text-xs text-red-500" />
        </div>

        <!-- Password -->
        <div x-data="{ show: false }">
            <label for="password" class="block font-semibold text-slate-700 text-xs mb-1">Password</label>
            <div class="relative">
                <input id="password" :type="show ? 'text' : 'password'" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter"
                    class="w-full rounded-xl border border-slate-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 text-sm py-2.5 pl-3.5 pr-12 bg-slate-50 focus:bg-white transition-all outline-none" />

                <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-xs text-slate-500 hover:text-slate-700 font-semibold focus:outline-none">
                    <span x-text="show ? 'Sembunyi' : 'Lihat'"></span>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-500" />
        </div>

        <!-- Confirm Password -->
        <div x-data="{ show: false }">
            <label for="password_confirmation" class="block font-semibold text-slate-700 text-xs mb-1">Konfirmasi Password</label>
            <div class="relative">
                <input id="password_confirmation" :type="show ? 'text' : 'password'" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi password"
                    class="w-full rounded-xl border border-slate-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 text-sm py-2.5 pl-3.5 pr-12 bg-slate-50 focus:bg-white transition-all outline-none" />

                <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-xs text-slate-500 hover:text-slate-700 font-semibold focus:outline-none">
                    <span x-text="show ? 'Sembunyi' : 'Lihat'"></span>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs text-red-500" />
        </div>

        <!-- Submit Button -->
        <div class="pt-3">
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl shadow-md transition-all text-sm">
                Daftar Akun
            </button>
        </div>

        <!-- Login Link -->
        <div class="text-center pt-2">
            <p class="text-xs text-slate-500">Sudah punya akun?
                <a href="{{ route('login') }}" class="text-blue-600 font-bold hover:underline">Masuk Sekarang</a>
            </p>
        </div>
    </form>
</x-guest-layout>
