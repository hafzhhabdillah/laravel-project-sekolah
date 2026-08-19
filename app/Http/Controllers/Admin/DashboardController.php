<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalGaleri = Gallery::count();
        $latestGalleries = Gallery::latest()->take(3)->get();

        $totalUser  = User::count();
        $totalGuru  = User::whereRaw('LOWER(role) = ?', ['guru'])->count();
        $totalSiswa = User::whereRaw('LOWER(role) = ?', ['siswa'])->count();
        $totalAdmin = User::whereRaw('LOWER(role) = ?', ['admin'])->count();

        // Mengarahkan ke view 'dashboard' utama
        return view('dashboard', compact(
            'totalGaleri',
            'latestGalleries',
            'totalUser',
            'totalGuru',
            'totalSiswa',
            'totalAdmin'
        ));
    }
}
