<?php
namespace App\Providers;
use App\Repositories\Interfaces\NewsRepositoryInterface;
use App\Repositories\Interfaces\TagsRepositoryInterface;
use App\Repositories\NewsRepository;
use App\Repositories\TagsRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            TagsRepositoryInterface::class,
            TagsRepository::class
        );

        $this->app->bind(
            NewsRepositoryInterface::class,
            NewsRepository::class
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
