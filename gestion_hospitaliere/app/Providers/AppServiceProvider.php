<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Définir des Gates pour les rôles
        Gate::define('manage-users', function ($user) {
            return $user->role === 'Administrateur';
        });

        Gate::define('manage-consultations', function ($user) {
            return in_array($user->role, ['Administrateur','Médecin']);
        });

        Gate::define('manage-stocks', function ($user) {
            return in_array($user->role, ['Administrateur', 'Infirmier']);
        });
    }
}

// namespace App\Providers;

// use Illuminate\Support\ServiceProvider;

// class AppServiceProvider extends ServiceProvider
// {
//     /**
//      * Register any application services.
//      */
//     public function register(): void
//     {
//         //
//     }

//     /**
//      * Bootstrap any application services.
//      */
//     public function boot(): void
//     {
//         //
//     }
// }
