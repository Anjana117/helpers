<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::controller(UserController::class)->group(function () {
    Route::prefix('register')->group(function () {
        Route::get('/', 'index');
        Route::post('/store', 'store')->name('store');
    });
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/update/{id}', 'update')->name('update');
    Route::delete('/delete{id} ', 'delete')->name('delete');
    Route::get('/search-user', 'searchUser')->name('search.user');
});
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index');
    Route::post('/loginMatch', 'login')->name('loginMatch');
    Route::get('/dashboard', 'dashboardPage')->name('dashboard');
    Route::get('/logout', 'logout')->name('logout');
});
Route::prefix('categories')->controller(CategoryController::class)->group(function () {
    Route::get('/', 'index')->name('categories.index');
    Route::post('/store', 'store')->name('categories.store');
    Route::delete('/delete/{id}', 'delete')->name('categories.delete');
});

Route::prefix('products')->controller(ProductController::class)->group(function () {
    Route::get('/create/{category}', 'create')->name('products.create');
    Route::post('/store', 'store')->name('products.store');
    Route::get('/show', 'show')->name('products.show');
    Route::delete('/delete/{id}', 'delete')->name('products.delete');
});

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::post('/books/{book}/attach', [BookController::class, 'attachUser'])->name('books.attach');
Route::get('/books/{book}/users', [BookController::class, 'showUsers'])->name('book.users');






