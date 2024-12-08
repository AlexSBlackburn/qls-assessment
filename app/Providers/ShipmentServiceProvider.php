<?php

namespace App\Providers;

use App\Services\ShipmentService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class ShipmentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ShipmentService::class, function (): ShipmentService {
            $client = Http::baseUrl(config('services.qls.api.url'))
                ->withBasicAuth(config('services.qls.api.user'), config('services.qls.api.password'))
                ->throw();

            return new ShipmentService($client);
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
