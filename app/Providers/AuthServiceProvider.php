<?php

namespace App\Providers;

use App\Models\AdminUser;
use App\Models\Permission;
use App\Models\Role;
use App\Policies\PermissionPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        AdminUser::class => UserPolicy::class,
        Role::class => RolePolicy::class,
        Permission::class => PermissionPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies(); // ← လိုတဲ့ကိစ္စ တစ်ခုတည်း

        // Gate::define('is-admin', function ($user) {
        //     return strtolower($user->role->name) === 'admin';
        // });
        // //ဝင်လာတဲ့ ကောင်နဲ့ တူလားစစ်
        // Gate::define('is-same-user', function ($user, $targetUserId) {
        //     return $user->id === $targetUserId;
        // });
        // //admin or ဝင်လာတဲ့ သူနဲ့ id တူမတူ 
        // Gate::define('smae-or-admin', function ($user, $targetUserId) {
        //     return (strtolower($user->role->name) === 'admin') || ($user->id === $targetUserId);
        // });


    }
}
