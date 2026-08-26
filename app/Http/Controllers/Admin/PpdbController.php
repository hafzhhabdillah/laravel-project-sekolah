<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ppdb;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    public function index()
    {
        $ppdbs = Ppdb::with('user')->latest()->paginate(10);
        return view('admin.ppdb.index', compact('ppdbs'));
    }

    // 👇 TAMBAHKAN METHOD SHOW INI DI SINI
    public function show($id)
    {
        $ppdb = Ppdb::with('user')->findOrFail($id);
        return view('admin.ppdb.show', compact('ppdb'));
    }

    public function edit($id)
    {
        $ppdb = Ppdb::findOrFail($id);
        return view('admin.ppdb.edit', compact('ppdb'));
    }

    public function update(Request $request, $id)
    {
        $ppdb = Ppdb::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'status' => 'required|in:pending,diterima,ditolak',
        ]);

        $data = $request->all();

        // Handle upload foto jika ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/foto'), $filename);
            $data['foto'] = $filename;
        }

        $ppdb->update($data);

        // Setelah update, arahkan balik ke halaman index dengan pesan sukses
        return redirect()->route('admin.ppdb.index')->with('success', 'Data pendaftaran berhasil diperbarui!');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diterima,ditolak',
        ]);

        $ppdb = Ppdb::findOrFail($id);
        $ppdb->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Status pendaftaran berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $ppdb = Ppdb::findOrFail($id);
        $ppdb->delete();

        return back()->with('success', 'Data pendaftaran berhasil dihapus!');
    }
}
