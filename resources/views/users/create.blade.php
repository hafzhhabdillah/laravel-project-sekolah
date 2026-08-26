@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ __('Daftarkan Anggota Baru') }}
        </h2>
    </x-slot>

    <div class="py-8 transition-all duration-300">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl p-6 md:p-8 border border-slate-100 shadow-sm space-y-6">
                <div>
                    <h3 class="text-lg font-bold text-slate-800">Form Pendaftaran Anggota</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Isi data akun di bawah ini untuk menambahkan pengguna baru.
                    </p>
                </div>

                <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            placeholder="Contoh: Ahmad Subagja"
                            class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                            required>
                        @error('name')
                            <span class="text-[10px] text-rose-500 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1">Username</label>
                        <input type="text" name="username" value="{{ old('username') }}"
                            placeholder="Contoh: ahmad_s"
                            class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                            required>
                        @error('username')
                            <span class="text-[10px] text-rose-500 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1">Alamat Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="ahmad@gmail.com"
                            class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                            required>
                        @error('email')
                            <span class="text-[10px] text-rose-500 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1">Password Default</label>
                        <input type="password" name="password" placeholder="Minimal 8 karakter"
                            class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                            required>
                        @error('password')
                            <span class="text-[10px] text-rose-500 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1">Hak Akses / Role</label>
                        <select name="role"
                            class="w-full px-4 py-2.5 text-xs rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none bg-white"
                            required>
                            <option value="siswa">Siswa / User</option>
                            <option value="admin">Administrator / Guru</option>
                        </select>
                        @error('role')
                            <span class="text-[10px] text-rose-500 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="pt-4 flex items-center justify-end gap-3">
                        <a href="{{ route('users.index') }}"
                            class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-bold rounded-xl transition-all">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-5 py-2 bg-blue-600 hover:bg-blue-700 active:scale-95 text-white text-xs font-bold rounded-xl transition-all shadow-sm shadow-blue-500/20">
                            Tambahkan Anggota
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
