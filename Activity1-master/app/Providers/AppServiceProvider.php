<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Inertia::share([
            'auth' => function () {
                $user = Auth::user();
                return [
                    'user' => $user ? $user->only('id', 'name', 'email', 'role') : null,
                ];
            },
        ]);
    }
}
