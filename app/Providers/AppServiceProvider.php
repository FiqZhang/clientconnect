<?php

namespace App\Providers;
use App\Models\Customer;
use App\Policies\customerPolicy;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        // Add this if auto-discovery isn't working
        Customer::class => CustomerPolicy::class,
    ];
    
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
        //
    }
}
