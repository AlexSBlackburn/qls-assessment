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
            $client = Http::baseUrl(config('services.qls.api.url'))
                ->withBasicAuth(config('services.qls.api.user'), config('services.qls.api.password'))
                ->throw();

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
