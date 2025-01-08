<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\VineyardCategory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades;
use Illuminate\View\View;
use Codewithkyrian\ChromaDB\ChromaDB;
use ModelflowAi\Ollama\Ollama;
use Codewithkyrian\ChromaDB\Client as ChromaDBClient;
use ModelflowAi\Ollama\Client as OllamaClient;
use Session;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(\Braintree\Gateway::class, static function() {
            return new \Braintree\Gateway([
                'environment' => config('braintree.env'),
                'merchantId' => config('braintree.merchant_id'),
                'publicKey' => config('braintree.public_key'),
                'privateKey' => config('braintree.private_key')
            ]);
        });

        $this->app->singleton(ChromaDBClient::class, static function() {
            return ChromaDB::client();
        });

        $this->app->singleton(OllamaClient::class, static function() {
            return Ollama::client();
        });
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
                $order = Order::find(Session::get('order_id'));
                $nborder = $order == null ? 0 : $order->bookings->count();
            }
            $view->with('vinecats', VineyardCategory::all());
            $view->with('nborder', $nborder);
        });
    }
}
