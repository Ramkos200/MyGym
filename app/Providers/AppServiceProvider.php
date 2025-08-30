<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        //instructor only
        Gate::define('schedual-class', function (User $user) {
            return $user->role === 'instructor';
        });
        //member only
        Gate::define('book-class', function (User $user) {
            return $user->role === 'member';
        });
    }
}