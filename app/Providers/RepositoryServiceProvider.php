<?php

namespace App\Providers;

use App\Interfaces\AuthorityRepositoryInterface;
use App\Interfaces\ListCategoryRepositoryInterface;
use App\Interfaces\ListsRepositoryInterface;
use App\Interfaces\ManagementCategoryRepositoryInterface;
use App\Interfaces\ManagementRepositoryInterface;
use App\Interfaces\MenuRepositoryInterface;
use App\Interfaces\MenusCategoryRepositoryInterface;
use App\Repositories\AuthorityRepository;
use App\Repositories\ListCategoryRepository;
use App\Repositories\ListsRepository;
use App\Repositories\ManagementCategoryRepository;
use App\Repositories\ManagementRepository;
use App\Repositories\MenusCategoryRepository;
use App\Repositories\MenuRepository;
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
            MenusCategoryRepositoryInterface::class,
            MenusCategoryRepository::class,
        );
        $this->app->bind(
            MenuRepositoryInterface::class,
            MenuRepository::class,
        );
        $this->app->bind(
            ListCategoryRepositoryInterface::class,
            ListCategoryRepository::class,
        );
        $this->app->bind(
            ListsRepositoryInterface::class,
            ListsRepository::class,
        );
        $this->app->bind(
            ManagementCategoryRepositoryInterface::class,
            ManagementCategoryRepository::class,
        );
        $this->app->bind(
            ManagementRepositoryInterface::class,
            ManagementRepository::class,
        );

        $this->app->bind(
            AuthorityRepositoryInterface::class,
            AuthorityRepository::class
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
