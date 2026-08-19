<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // 1. Tampilkan Semua User
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    // 2. Form Edit User
    public function edit(User $user)
    {
        // PENCEGAHAN: Admin tidak bisa edit sesama Admin (kecuali dirinya sendiri)
        if (strtolower($user->role ?? '') === 'admin' && auth()->id() !== $user->id) {
            return redirect()->route('users.index')->with('error', 'Anda tidak memiliki akses untuk mengubah akun Admin lain!');
        }

        return view('users.edit', compact('user'));
    }

    // 3. Update Data User
    public function update(Request $request, User $user)
    {
        // Proteksi Ulang
        if (strtolower($user->role ?? '') === 'admin' && auth()->id() !== $user->id) {
            return redirect()->route('users.index')->with('error', 'Aksi dilarang!');
        }

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'role'  => 'required|in:admin,siswa',
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'role'  => strtolower($request->role),
        ]);

        return redirect()->route('users.index')->with('success', 'Data user berhasil diperbarui!');
    }

    // 4. Hapus User
    public function destroy(User $user)
    {
        // PENCEGAHAN: Akun Admin tidak dapat dihapus
        if (strtolower($user->role ?? '') === 'admin') {
            return redirect()->route('users.index')->with('error', 'Akun ber-role Admin tidak dapat dihapus!');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus!');
    }
}
