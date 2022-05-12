<?php

namespace App\Providers;

use App\Interfaces\ActivityLogRepositoryInterface;
use App\Interfaces\IncomeConfigurationRepositoryInterface;
use App\Interfaces\IncomeRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\ActivityLogRepository;
use App\Repositories\IncomeConfigurationRepository;
use App\Repositories\IncomeRepository;
use App\Repositories\UserRepository;
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
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

        $this->app->bind(ActivityLogRepositoryInterface::class, ActivityLogRepository::class);

        $this->app->bind(IncomeConfigurationRepositoryInterface::class, IncomeConfigurationRepository::class);

        $this->app->bind(IncomeRepositoryInterface::class, IncomeRepository::class);
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
