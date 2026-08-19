<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ __('Kelola User') }}
        </h2>
    </x-slot>

    <div class="py-8 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- Stat Bar Soft Colors -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow flex items-center justify-between">
                    <div>
                        <p class="text-xs font-extrabold text-slate-400 uppercase tracking-wider">Total Pengguna</p>
                        <h3 class="text-2xl font-black text-slate-800 mt-1">{{ $users->total() ?? count($users) }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow flex items-center justify-between">
                    <div>
                        <p class="text-xs font-extrabold text-slate-400 uppercase tracking-wider">Administrator</p>
                        <h3 class="text-2xl font-black text-slate-800 mt-1">{{ $users->where('role', 'admin')->count() }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow flex items-center justify-between">
                    <div>
                        <p class="text-xs font-extrabold text-slate-400 uppercase tracking-wider">Siswa / User</p>
                        <h3 class="text-2xl font-black text-slate-800 mt-1">{{ $users->where('role', 'siswa')->count() }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                    </div>
                </div>
            </div>

            <!-- Search Filter Bar Card -->
            <div class="bg-white rounded-3xl p-6 border border-slate-100 shadow-sm space-y-4">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-xl font-extrabold text-slate-800">Daftar Pengguna</h2>
                        <p class="text-xs text-slate-500 mt-1">Kelola data, tingkat akses (role), dan pengaturan akun terdaftar.</p>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-3 pt-2">
                    <div class="relative w-full sm:w-80">
                        <svg class="w-4 h-4 absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Cari nama, username, atau email..." class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all outline-none">
                    </div>

                    <select id="roleFilter" onchange="filterTable()" class="w-full sm:w-48 px-3.5 py-2.5 rounded-xl border border-slate-200 text-xs font-semibold text-slate-600 focus:ring-2 focus:ring-blue-500 transition-all outline-none bg-white">
                        <option value="">Semua Role</option>
                        <option value="ADMIN">ADMIN</option>
                        <option value="SISWA">SISWA</option>
                    </select>
                </div>
            </div>

            <!-- Table Card dengan Animated Buttons -->
            <div class="hidden md:block bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
                <table class="w-full text-left border-collapse" id="userTable">
                    <thead>
                        <tr class="bg-slate-50/80 border-b border-slate-100 text-[11px] font-black text-slate-400 uppercase tracking-wider">
                            <th class="p-4 pl-6">Pengguna</th>
                            <th class="p-4">Username</th>
                            <th class="p-4">Email</th>
                            <th class="p-4">Role</th>
                            <th class="p-4">Rilis Terdaftar</th>
                            <th class="p-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs">
                        @forelse($users as $u)
                        <tr class="hover:bg-blue-50/30 transition-colors user-row">
                            <td class="p-4 pl-6 font-semibold text-slate-800">
                                <div class="flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($u->name) }}&color=2563EB&background=DBEAFE&bold=true" class="w-10 h-10 rounded-full object-cover shadow-sm transition-transform hover:scale-110">
                                    <div>
                                        <div class="font-bold text-slate-800 user-name">{{ $u->name }}</div>
                                        <div class="text-[10px] text-slate-400">ID: #{{ $u->id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4 font-medium text-slate-600 user-username">
                                <span class="bg-slate-100 text-slate-700 px-2.5 py-1 rounded-lg text-xs font-semibold">
                                    {{ isset($u->username) ? '@'.$u->username : '@'.Illuminate\Support\Str::slug($u->name, '') }}
                                </span>
                            </td>
                            <td class="p-4 font-medium text-slate-600 user-email">{{ $u->email }}</td>
                            <td class="p-4">
                                <span class="px-3 py-1 text-[11px] font-extrabold rounded-full inline-flex items-center gap-1.5 user-role
                                    {{ strtolower($u->role) === 'admin' ? 'bg-purple-100 text-purple-700 border border-purple-200' : 'bg-slate-100 text-slate-700 border border-slate-200' }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ strtolower($u->role) === 'admin' ? 'bg-purple-600' : 'bg-slate-500' }}"></span>
                                    {{ strtoupper($u->role) }}
                                </span>
                            </td>
                            <td class="p-4 text-slate-500 font-medium">
                                <div class="flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    {{ $u->created_at ? $u->created_at->translatedFormat('d M Y, H:i') : '10 Aug 2026, 07:01' }}
                                </div>
                            </td>
                            <td class="p-4 text-center">
                                @if(strtolower($u->role) === 'admin' && auth()->id() !== $u->id)
                                    <span class="text-[11px] text-slate-400 italic bg-slate-50 px-3 py-1 rounded-xl border border-slate-100">Locked (Admin)</span>
                                @else
                                    <div class="flex justify-center items-center gap-2">
                                        <a href="{{ route('users.edit', $u->id) }}" class="text-xs bg-amber-500 hover:bg-amber-600 active:scale-95 text-white px-3.5 py-1.5 rounded-xl transition-all font-semibold shadow-sm hover:shadow-amber-500/25">
                                            Edit
                                        </a>
                                        @if(strtolower($u->role) !== 'admin')
                                            <form action="{{ route('users.destroy', $u->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-xs bg-rose-500 hover:bg-rose-600 active:scale-95 text-white px-3.5 py-1.5 rounded-xl transition-all font-semibold shadow-sm hover:shadow-rose-500/25">
                                                    Hapus
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-12 text-slate-400">Belum ada data.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Mobile Card View Mode -->
            <div class="grid grid-cols-1 gap-4 md:hidden">
                @foreach($users as $u)
                    <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($u->name) }}&color=2563EB&background=DBEAFE&bold=true" class="w-10 h-10 rounded-full">
                                <div>
                                    <h4 class="font-bold text-slate-800 text-sm">{{ $u->name }}</h4>
                                    <p class="text-xs text-slate-500">{{ $u->email }}</p>
                                </div>
                            </div>
                            <span class="px-2.5 py-1 text-[10px] font-extrabold rounded-full {{ strtolower($u->role) === 'admin' ? 'bg-purple-100 text-purple-700' : 'bg-slate-100 text-slate-700' }}">
                                {{ strtoupper($u->role) }}
                            </span>
                        </div>
                        <div class="pt-3 border-t border-slate-100 flex items-center justify-end gap-2">
                            <a href="{{ route('users.edit', $u->id) }}" class="text-xs bg-amber-500 text-white px-4 py-1.5 rounded-xl font-semibold">Edit</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">{{ $users->links() }}</div>
        </div>
    </div>

    <script>
        function filterTable() {
            const searchVal = document.getElementById('searchInput').value.toLowerCase();
            const roleVal = document.getElementById('roleFilter').value.toUpperCase();
            const rows = document.querySelectorAll('.user-row');

            rows.forEach(row => {
                const name = row.querySelector('.user-name').textContent.toLowerCase();
                const username = row.querySelector('.user-username').textContent.toLowerCase();
                const email = row.querySelector('.user-email').textContent.toLowerCase();
                const role = row.querySelector('.user-role').textContent.trim().toUpperCase();

                const matchesSearch = name.includes(searchVal) || username.includes(searchVal) || email.includes(searchVal);
                const matchesRole = roleVal === "" || role.includes(roleVal);

                row.style.display = (matchesSearch && matchesRole) ? "" : "none";
            });
        }
    </script>
</x-app-layout>
