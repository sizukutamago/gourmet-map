<?php

namespace App\Providers;

use Acme\Domain\Repositories\StoreRepositoryInterface;
use Acme\Infrastructures\Repositories\StoreRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            StoreRepositoryInterface::class, StoreRepository::class
        );
    }
}
