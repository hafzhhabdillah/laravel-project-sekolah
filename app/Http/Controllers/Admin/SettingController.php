<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    // Tambahkan ini agar aman dipanggil dari menu index/sidebar
    public function index()
    {
        return $this->edit();
    }

    public function edit()
    {
        // Ambil data setting pertama, jika belum ada buat baris kosong
        $setting = Setting::first() ?? new Setting();
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'school_name'  => 'required|string|max:255',
            'address'      => 'nullable|string',
            'phone_number' => 'nullable|string|max:20',
            'maps_link'    => 'nullable|string',
        ]);

        $setting = Setting::first();

        if (!$setting) {
            Setting::create($request->all());
        } else {
            $setting->update($request->all());
        }

        return redirect()->back()->with('success', 'Pengaturan sekolah berhasil diperbarui!');
    }
}
