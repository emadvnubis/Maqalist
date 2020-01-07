<?php

namespace Maqalist\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'Maqalist\Model' => 'Maqalist\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-users', function($user){
          return $user->hasAnyRoles(['admin','moderator']);
        });

        Gate::define('edit-users', function($user){
          return $user->hasRole('admin');
        });

    }
}
