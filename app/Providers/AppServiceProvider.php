<?php

namespace App\Providers;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryEloquent;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryEloquent;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryEloquent;
use App\Repositories\Book\BookRepository;
use App\Repositories\Book\BookRepositoryEloquent;
use App\Repositories\BookCategory\BookCategoryRepository;
use App\Repositories\BookCategory\BookCategoryRepositoryEloquent;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
        $this->app->bind(BookRepository::class, BookRepositoryEloquent::class);
        $this->app->bind(CategoryRepository::class, CategoryRepositoryEloquent::class);
        $this->app->bind(ProductRepository::class, ProductRepositoryEloquent::class);
        $this->app->bind(BookCategoryRepository::class, BookCategoryRepositoryEloquent::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
