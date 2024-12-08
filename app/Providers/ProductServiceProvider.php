<?php

namespace App\Providers;

use App\Services\ProductService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ProductService::class, function (): ProductService {
            $client = Http::baseUrl(config('services.qls.api.url'))
                ->withBasicAuth(config('services.qls.api.user'), config('services.qls.api.password'))
                ->throw();

            return new ProductService($client);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
