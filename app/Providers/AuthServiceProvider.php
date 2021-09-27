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

    public static $permissions = [
        'index-product' => ['manager', 'customer'],
        'show-product' => ['manager', 'customer'],
        'create-product' => ['manager'],
        'store-product' => ['manager'],
        'edit-product' => ['manager'],
        'update-product' => ['manager'],
        'destroy-product' => ['manager'],
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /* define a admin user role */
        Gate::define('isAdmin', function($user) {
            return $user->role == 'admin';
         });
        
         /* define a manager user role */
         Gate::define('isCustomer', function($user) {
             return $user->role == 'customer';
         });
       

        /* Roles based authorization
        Gate::before(
            function ($user, $ability) {
                if ($user->role === 'admin') {
                    return true;
                }
            }
        );

        foreach (self::$permissions as $action=> $roles) {
            Gate::define(
                $action,
                function (User $user) use ($roles) {
                    if (in_array($user->role, $roles)) {
                        return true;
                    }
                }
            );
        }*/
    }
}
