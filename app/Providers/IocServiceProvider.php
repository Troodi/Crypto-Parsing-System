<?php
namespace App\Providers;

use App\Services\ApiService;
use App\Services\Interfaces\ApiServiceInterface;
use App\Services\Interfaces\NewsServiceInterface;
use App\Services\NewsService;
use Illuminate\Support\ServiceProvider;


class IocServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ApiServiceInterface::class,
            ApiService::class
        );

        $this->app->bind(
            NewsServiceInterface::class,
            NewsService::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
