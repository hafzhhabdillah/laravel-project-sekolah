<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // 1. Tampilkan Semua User
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    // 2. Form Tambah User Baru (Daftarkan Anggota)
    public function create()
    {
        return view('users.create');
    }

    // 3. Simpan User Baru ke Database
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'role'     => 'required|in:admin,siswa',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => strtolower($request->role),
        ]);

        return redirect()->route('users.index')->with('success', 'Anggota baru berhasil didaftarkan!');
    }

    // 4. Form Edit User
    public function edit(User $user)
    {
        if (strtolower($user->role ?? '') === 'admin' && auth()->id() !== $user->id) {
            return redirect()->route('users.index')->with('error', 'Anda tidak memiliki akses untuk mengubah akun Admin lain!');
        }

        return view('users.edit', compact('user'));
    }

    // 5. Update Data User
    public function update(Request $request, User $user)
    {
        if (strtolower($user->role ?? '') === 'admin' && auth()->id() !== $user->id) {
            return redirect()->route('users.index')->with('error', 'Aksi dilarang!');
        }

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'role'     => 'required|in:admin,guru,siswa',
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'role'  => strtolower($request->role),
        ]);

        return redirect()->route('users.index')->with('success', 'Data user berhasil diperbarui!');
    }

    // 6. Hapus User
    public function destroy(User $user)
    {
        if (strtolower($user->role ?? '') === 'admin') {
            return redirect()->route('users.index')->with('error', 'Akun ber-role Admin tidak dapat dihapus!');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus!');
    }
}
