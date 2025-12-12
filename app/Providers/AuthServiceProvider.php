<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot(): void
    {
        $this->registerPolicies(); // ← လိုတဲ့ကိစ္စ တစ်ခုတည်း

        Gate::define('is-admin', function ($user) {
            return strtolower($user->role->name) === 'admin';
        });
    }
}
