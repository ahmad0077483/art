<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\Permission;
use App\Models\Team;
use App\Policies\OrderPolicy;
use App\Policies\TeamPolicy;
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
        Team::class => TeamPolicy::class,
        Order::class=>OrderPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::before(function ($user){
if ($user->isSuperUser()) return true ;
        });
        $this->registerPolicies();
        foreach (Permission::all() as $permission){
            Gate::define($permission->name, function ($user) use ($permission){
                return $user->hasPermission($permission);
            });
        }



    }
}
