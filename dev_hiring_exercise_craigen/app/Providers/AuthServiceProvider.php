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

        Gate::define('export-patients', function ($user) {
            return $user->is_admin;
        });

        Gate::define('create-patients', function ($user) {
            return $user->is_admin;
        });

        Gate::define('record-patient-blood-pressure', function ($user) {
            return $user->is_admin || $user->is_nurse;
        });
    }
}
