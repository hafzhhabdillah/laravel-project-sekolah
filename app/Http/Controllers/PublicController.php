<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Setting;

class PublicController extends Controller
{
    public function home()
    {
        $setting = Setting::first();
        return view('public.home', compact('setting'));
    }

    public function about()
    {
        $setting = Setting::first();
        return view('public.about', compact('setting'));
    }

    public function gallery()
    {
        $setting = Setting::first();
        $galleries = Gallery::latest()->paginate(9);
        return view('public.gallery', compact('setting', 'galleries'));
    }

    public function contact()
    {
        $setting = Setting::first();
        return view('public.contact', compact('setting'));
    }
}
