<?php

namespace App\Providers;

use App\Models\VineyardCategory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades;
use Illuminate\View\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Facades\View::composer('layouts.app', function(View $view) {
            $view->with('vinecats', VineyardCategory::all());
        });
    }
}
