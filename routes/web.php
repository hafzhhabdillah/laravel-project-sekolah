<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\SettingController;
use App\Models\User;
use App\Models\Gallery;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\UserController;

Route::middleware(['auth'])->group(function () {
    // Route Dashboard & User
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::resource('users', UserController::class);

    // Tambahkan ->name('admin.gallery') dan ->name('admin.settings') di sini:
    Route::get('/admin/gallery', [GalleryController::class, 'index'])->name('admin.gallery');
    Route::get('/admin/settings', [SettingController::class, 'index'])->name('admin.settings');
});

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


// 2. AUTHENTICATED ROUTES
Route::middleware(['auth', 'verified'])->group(function () {

    // Route Khusus ADMIN (Kelola User)
    Route::middleware(['can:isAdmin'])->group(function () {
        Route::resource('users', UserController::class)->except(['create', 'store', 'show']);
    });

    // Single Dashboard Route
    Route::get('/dashboard', function () {
        $totalGuru   = User::whereRaw('LOWER(role) = ?', ['guru'])->count();
        $totalSiswa  = User::whereRaw('LOWER(role) = ?', ['siswa'])->count();
        $totalGaleri = Gallery::count();

        return view('dashboard', compact('totalGuru', 'totalSiswa', 'totalGaleri'));
    })->name('dashboard');

    // Logout
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Email verification notification
    Route::post('/email/verification-notification', function () {
        return back();
    })->name('verification.send');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/password', [PasswordController::class, 'update'])->name('password.update');

    // User Pages
    Route::get('/user/gallery', function () {
        $galleries = Gallery::latest()->paginate(9);
        return view('user.gallery', compact('galleries'));
    })->name('user.gallery');

    Route::get('/user/info', function () {
        return view('user.info');
    })->name('user.info');
});

// PENGELOLA ROUTES (Khusus Admin)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('gallery', GalleryController::class);
    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
});

require __DIR__.'/auth.php';
