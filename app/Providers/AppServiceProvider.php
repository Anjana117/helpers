<?php

namespace App\Providers;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\User\CategoryRepositoryEloquent;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->bind(UserRepository::class, CategoryRepositoryEloquent::class);


        $this->app->bind(CategoryRepository::class, CategoryRepositoryEloquent::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
