<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\VineyardCategory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades;
use Illuminate\View\View;
use Session;


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
            $nborder = 0;
            if(Session::has('order_id')) 
            {
                $nborder = Order::find(Session::get('order_id'))->bookings->count();
            }
            $view->with('vinecats', VineyardCategory::all());
            $view->with('nborder', $nborder);
        });
    }
}
