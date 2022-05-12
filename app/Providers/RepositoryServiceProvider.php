<?php

namespace App\Providers;

use App\Interfaces\ActivityLogRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\ActivityLogRepository;
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
