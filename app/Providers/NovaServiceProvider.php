<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        // Ora controlliamo che l'utente abbia il ruolo "SafeTech-admin" per accedere a Nova
        Gate::define('viewNova', function ($user) {
            return $user->hasRole('SafeTech-admin');
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Register the resources that should be listed in the Nova sidebar.
     *
     * @return void
     */
    public function resources()
    {
        Nova::resources([
            \App\Nova\User::class,
            \App\Nova\CompanyUser::class,
            \App\Nova\Device::class,
            \App\Nova\Subscription::class,
            \App\Nova\Company::class,
            \App\Nova\DeviceType::class,
            \App\Nova\Role::class,           // Aggiungi la risorsa Ruoli
            \App\Nova\Permission::class,     // Aggiungi la risorsa Permessi
            // Aggiungi altre risorse se necessario
        ]);
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
         
            // Aggiungi eventuali tool per Nova
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

