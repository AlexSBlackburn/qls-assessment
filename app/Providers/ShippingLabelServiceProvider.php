<?php

namespace App\Providers;

use App\Services\ShippingLabelService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class ShippingLabelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ShippingLabelService::class, function (): ShippingLabelService {
            $client = Http::baseUrl(config('services.qls.api.url').'/v2')->throw();

            return new ShippingLabelService($client);
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
