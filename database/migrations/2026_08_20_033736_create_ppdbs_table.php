<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ppdbs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Data Calon Siswa
            $table->string('nisn')->unique();
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('asal_sekolah');
            $table->string('jurusan_pilihan'); // RPL, TKJ, DKV, Broadcasting, dll

            // Data Orang Tua / Wali
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('no_hp_ortu');
            $table->text('alamat');

            // Berkas Upload
            $table->string('berkas_ijazah')->nullable();
            $table->string('berkas_kk')->nullable();

            // Status Pendaftaran
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->text('catatan_admin')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ppdbs');
    }
};
