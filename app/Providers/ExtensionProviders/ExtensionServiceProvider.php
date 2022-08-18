<?php

namespace App\Providers\ExtensionProviders;

use App\Contracts\Repositories\ProductRepositoryContract;
use App\Contracts\Services\ProductServiceContract;
use App\Services\Product\ProductService;
use Illuminate\Support\ServiceProvider;

class ExtensionServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductServiceContract::class, function () {
            return new ProductService($this->app->make(ProductRepositoryContract::class));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

