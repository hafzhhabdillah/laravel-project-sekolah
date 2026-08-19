@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="p-5 mb-4 bg-light rounded-3 border">
        <h1 class="display-5 fw-bold">Dashboard Admin</h1>
        <p class="fs-4">Selamat datang di Panel Admin {{ $setting->school_name ?? '' }}.</p>
        <div class="d-flex gap-2 mt-4">
            <a href="{{ route('admin.gallery.index') }}" class="btn btn-primary">Kelola Galeri</a>
            <a href="{{ route('admin.settings.index') }}" class="btn btn-outline-secondary">Pengaturan Sekolah</a>
        </div>
    </div>
</div>

@endsection
