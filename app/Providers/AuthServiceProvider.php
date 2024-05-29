<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //

        // Определение является ли пользователь администратором
        Gate::define(
            'admin',
            function ($user) {
                if ($user->role == 'admin') {
                    return true;
                }
                return false;
            }
        );
        // Gate::define('admin', fn ($user) => $user->role == 'admin');
        // Определение обычного зарегистрированного пользователя
        Gate::define(
            'user',
            function ($user) {
                if ($user->role == 'user') {
                    return true;
                }
                return false;
            }
        );
    }
}

