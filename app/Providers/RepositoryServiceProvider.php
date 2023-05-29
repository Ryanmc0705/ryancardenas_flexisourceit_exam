<?php

namespace App\Providers;

use App\Repository\CustomerDoctrineRepo;
use App\Repository\CustomerDoctrineRepoInterface;
use App\Repository\CustomerRepo;
use App\Repository\CustomerRepoInterface;
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
        $this->app->bind(CustomerRepoInterface::class,CustomerRepo::class);

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
