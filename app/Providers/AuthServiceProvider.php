<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Policies\ProductPolicy;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Log;
use App\Models\User;

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
        Log::info('inside auths servie provider');

        Gate::define('create-product', function (User $user) {
        
            Log::info('inside auths servie provider gate');
            return $user->hasPermissionTo('create-product');
        });
        Gate::define('edit-product', function (User $user) {
            return $user->hasPermissionTo('edit-product');
        });
        Gate::define('delete-product', function (User $user) {
            return $user->hasPermissionTo('delete-product');
        });
    }

}
