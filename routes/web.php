<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PpdbController as AdminPpdbController;
use App\Http\Controllers\User\PpdbController as UserPpdbController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\Gallery;
use App\Models\Ppdb;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. PUBLIC ROUTES
Route::get('/', function () {
    return view('public.home');
})->name('home');

Route::get('/about', function () {
    return view('public.about');
})->name('about');

Route::get('/gallery', function () {
    $galleries = Gallery::latest()->paginate(9);
    return view('public.gallery', compact('galleries'));
})->name('gallery');

Route::get('/contact', function () {
    return view('public.contact');
})->name('contact');


// 2. AUTHENTICATED ROUTES (UMUM / SISWA & ADMIN)
Route::middleware(['auth', 'verified'])->group(function () {

    // Dynamic Dashboard Redirect based on Role
    Route::get('/dashboard', function () {
        $role = strtolower(Auth::user()->role ?? '');

        if ($role === 'admin' || $role === 'guru') {
            return redirect()->route('admin.dashboard');
        }

        $totalGuru   = User::whereRaw('LOWER(role) = ?', ['guru'])->count();
        $totalSiswa  = User::whereRaw('LOWER(role) = ?', ['siswa'])->count();
        $totalGaleri = Gallery::count();

        return view('dashboard', compact('totalGuru', 'totalSiswa', 'totalGaleri'));
    })->name('dashboard');

    // Route Kelola User Umum
    Route::resource('users', UserController::class);

    // Logout & Profile
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/password', [PasswordController::class, 'update'])->name('password.update');

    // User Pages Lainnya
    Route::get('/user/gallery', function () {
        $galleries = Gallery::latest()->paginate(9);
        return view('user.gallery', compact('galleries'));
    })->name('user.gallery');

    Route::get('/user/info', function () {
        return view('user.info');
    })->name('user.info');

    // =========================================================================
    // 3. ROUTE PPDB USER (Menggunakan UserPpdbController yang bersih)
    // =========================================================================
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/ppdb', [UserPpdbController::class, 'index'])->name('ppdb.index');
        Route::get('/ppdb/create', [UserPpdbController::class, 'create'])->name('ppdb.create');
        Route::post('/ppdb', [UserPpdbController::class, 'store'])->name('ppdb.store');
        Route::get('/ppdb/detail', [UserPpdbController::class, 'show'])->name('ppdb.detail');
        Route::get('/ppdb/export-pdf', [UserPpdbController::class, 'exportPdf'])->name('ppdb.export-pdf');

        // PERBAIKAN DI SINI (Hapus kata '/user' di depannya karena sudah ada prefix)
        Route::get('/ppdb/export-excel', [UserPpdbController::class, 'exportExcel'])->name('ppdb.export-excel');
    });
});


// 4. ROUTE KHUSUS ADMIN & GURU
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('ppdb', AdminPpdbController::class);

    // Route khusus tambahan admin untuk export excel
    Route::get('/ppdb-export-excel', [AdminPpdbController::class, 'exportExcel'])->name('ppdb.export-excel');

    Route::resource('gallery', GalleryController::class);

    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::get('/settings/edit', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
});

require __DIR__ . '/auth.php';
