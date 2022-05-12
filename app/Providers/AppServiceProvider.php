<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('driver', function(User $user) {
            return $user->role == '1';
        });

        Gate::define('customer', function(User $user) {
            return $user->role == '2';
        });

        Gate::define('pegawai', function(User $user) {
            return $user->role == '3';
        });
    }
}
