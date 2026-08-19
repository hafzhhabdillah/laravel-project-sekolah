@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 fw-bold">Pengaturan Informasi Sekolah</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Sekolah</label>
            <input type="text" name="school_name" class="form-control" value="{{ old('school_name', $setting->school_name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nomor Telepon / WhatsApp</label>
            <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $setting->phone_number ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat / Lokasi Sekolah</label>
            <textarea name="address" class="form-control" rows="4" required>{{ old('address', $setting->address ?? '') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
