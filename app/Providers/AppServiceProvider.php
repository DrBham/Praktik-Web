<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
public function boot(): void
{
    Gate::define("view-student", function (User $user) {
        if ($user->role === "admin" || $user->role === "guest") {
            return true;
        }
        return false;
    });

    Gate::define("store-student", function (User $user) {
        if ($user->role === "admin") {
            return true;
        }
        return false;
    });

    Gate::define("edit-student", function (User $user) {
        if ($user->role === "admin") {
            return true;
        }
        return false;
    });

    Gate::define("destroy-student", function (User $user) {
        if ($user->role === "admin") {
            return true;
        }
        return false;
    });
}
}