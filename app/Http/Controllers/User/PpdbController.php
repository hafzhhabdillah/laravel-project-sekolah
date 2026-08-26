<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ppdb;

class PpdbController extends Controller
{
    public function index()
    {
        $ppdb = Ppdb::where('user_id', Auth::id())->first();

        if (!$ppdb) {
            return redirect()->route('user.ppdb.create');
        }

        return view('user.ppdb.index', compact('ppdb'));
    }

    public function show()
    {
        // Mengambil data PPDB milik user yang sedang login
        $ppdb = Ppdb::where('user_id', auth()->id())->firstOrFail();

        return view('user.ppdb.show', compact('ppdb')); // <--- Ganti jadi user.ppdb.show
    }

    public function create()
    {
        $ppdb = Ppdb::where('user_id', Auth::id())->first();

        if ($ppdb) {
            return redirect()->route('user.ppdb.index');
        }

        return view('user.ppdb.create');
    }

    public function exportExcel()
{
    // Ambil data PPDB (bisa semua data pendaftar atau data user yang sedang login)
    // Contoh di sini kita ambil semua data untuk rekap panitia:
    $ppdbs = Ppdb::all();

    $filename = 'rekap-ppdb-' . date('Y-m-d') . '.xls';

    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");

    // Tampilkan view khusus tabel excel
    return view('user.ppdb.excel', compact('ppdbs'));
}

    public function store(Request $request)
{
    // Pastikan semua input dari form di-validasi agar masuk ke $validated
    $validated = $request->validate([
        'nisn'          => 'required|numeric',
        'nama_lengkap'  => 'required|string|max:255',
        'jenis_kelamin' => 'required|in:L,P',
        'tempat_lahir'  => 'required|string|max:255', // <-- Pastikan ini ada
        'tanggal_lahir' => 'required|date',
        'asal_sekolah'  => 'required|string|max:255',
        'jurusan_pilihan' => 'required|string|max:255',
        'nama_ayah'     => 'required|string|max:255',
        'nama_ibu'      => 'required|string|max:255',
        'no_hp_ortu'    => 'required|numeric',
        'alamat'        => 'required|string',
    ]);

    // Tambahkan data tambahan otomatis
    $validated['user_id'] = Auth::id();
    $validated['status']  = 'pending';

    // Simpan ke database
    Ppdb::create($validated);

    return redirect()->route('user.ppdb.index')->with('success', 'Pendaftaran PPDB berhasil dikirim!');
}

    public function exportPdf()
    {
        $ppdb = Ppdb::where('user_id', Auth::id())->firstOrFail();
        return view('user.ppdb.pdf', compact('ppdb'));
    }
}
