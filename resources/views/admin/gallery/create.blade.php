@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Foto Galeri Baru</h2>
    </x-slot>

    <div class="py-12 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Judul Kegiatan / Foto</label>
                <input type="text" name="title" required value="{{ old('title') }}" class="w-full rounded-xl border border-slate-300 p-2.5 text-sm outline-none focus:border-blue-600">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Pilih File Foto (Maks 2MB)</label>
                <input type="file" name="image" required accept="image/*" class="w-full text-sm text-slate-600">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Deskripsi Keterangan (Opsional)</label>
                <textarea name="description" rows="3" class="w-full rounded-xl border border-slate-300 p-2.5 text-sm outline-none focus:border-blue-600">{{ old('description') }}</textarea>
            </div>

            <div class="pt-2 flex items-center gap-3">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-5 py-2.5 rounded-xl text-sm transition-all">Simpan ke Galeri</button>
                <a href="{{ route('admin.gallery.index') }}" class="text-xs font-bold text-slate-500 hover:underline">Batal</a>
            </div>
        </form>
    </div>
@endsection
