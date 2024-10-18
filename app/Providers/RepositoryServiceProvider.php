<?php

namespace App\Providers;

use App\Repositories\Interfaces\MallRepositoryInterface;
use App\Repositories\Interfaces\TenantRepositoryInterface;
use App\Repositories\MallRepository;
use App\Repositories\TenantRepository;
use App\Services\MallService;
use App\Services\TenantService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(MallRepositoryInterface::class, MallRepository::class);
        $this->app->bind(MallService::class, function ($app) {
            return new MallService($app->make(MallRepositoryInterface::class));
        });

        $this->app->bind(TenantRepositoryInterface::class, TenantRepository::class);
        $this->app->bind(TenantService::class, function ($app) {
            return new TenantService($app->make(TenantRepositoryInterface::class));
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
