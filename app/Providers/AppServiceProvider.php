<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Order;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('order-user', function (User $user, Order $order) {
            return $user->id === $order->user_id;
        });

        \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::except([
            'verify-payment'
        ]);
    }
}
