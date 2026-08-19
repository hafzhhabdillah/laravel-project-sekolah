<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-slate-800 leading-tight">
                Edit Foto Galeri
            </h2>
            <a href="{{ route('admin.gallery.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs px-4 py-2.5 rounded-xl font-bold transition-all">
                &larr; Kembali ke Galeri
            </a>
        </div>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
            <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Preview Gambar Saat Ini -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Gambar Saat Ini</label>
                    <div class="w-48 h-32 rounded-xl overflow-hidden border border-slate-200 shadow-sm mb-3">
                        <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Input Upload Gambar Baru (Opsional) -->
                <div>
                    <label for="image" class="block text-sm font-bold text-slate-700 mb-1">Ganti Gambar (Opsional)</label>
                    <input type="file" name="image" id="image" accept="image/*"
                           class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100 transition-all border border-slate-200 rounded-xl p-1">
                    @error('image')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Input Judul Foto -->
                <div>
                    <label for="title" class="block text-sm font-bold text-slate-700 mb-1">Judul Foto</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $gallery->title) }}" required
                           class="w-full text-sm border-slate-200 rounded-xl px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                    @error('title')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Input Deskripsi Foto -->
                <div>
                    <label for="description" class="block text-sm font-bold text-slate-700 mb-1">Deskripsi Foto</label>
                    <textarea name="description" id="description" rows="4"
                              class="w-full text-sm border-slate-200 rounded-xl px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">{{ old('description', $gallery->description) }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Button Submit -->
                <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
                    <a href="{{ route('admin.gallery.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs px-5 py-2.5 rounded-xl font-bold transition-all">
                        Batal
                    </a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-5 py-2.5 rounded-xl font-bold transition-all shadow-md shadow-blue-500/20">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
