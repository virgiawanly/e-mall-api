<?php

namespace App\Providers;

use App\Repositories\Interfaces\MallRepositoryInterface;
use App\Repositories\MallRepository;
use App\Services\MallService;
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
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
