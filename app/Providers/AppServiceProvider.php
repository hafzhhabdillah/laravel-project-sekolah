<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Share variabel $setting ke semua view
        View::composer('*', function ($view) {
            $view->with('setting', Setting::first());
        });

        // Gate untuk mengecek Admin
        Gate::define('isAdmin', function (User $user) {
            return strtolower($user->role ?? '') === 'admin';
        });
    }
}
