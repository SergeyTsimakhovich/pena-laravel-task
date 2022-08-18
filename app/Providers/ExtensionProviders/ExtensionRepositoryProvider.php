<?php

namespace App\Providers\ExtensionProviders;

use App\Repositories\Product\ProductRepository;
use App\Contracts\Repositories\ProductRepositoryContract;
use Illuminate\Support\ServiceProvider;

class ExtensionRepositoryProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductRepositoryContract::class, function () {
            return new ProductRepository();
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

