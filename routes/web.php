<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
Route::get('/',function()
{

    return view('home');
}

);
Route::controller(UserController::class)->group(function (){
    Route::prefix('register')->group(function () {
        Route::get('/','index');
        Route::post('/store','store');
    });
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/update/{id}', 'update')->name('update');
    Route::delete('/delete{id} ','delete')->name('delete');
    Route::get('/search-user','searchUser')->name('search.user');
});
Route::controller(LoginController::class)->group(function (){
    Route::get('/login', 'index');
    Route::post('/loginMatch', 'login')->name('loginMatch');
    Route::get('/dashboard', 'dashboardPage')->name('dashboard');
    Route::get('/logout','logout')->name('logout');
});
// Route::get('/addcategory',[CategoryController::class,'index'])->name('category');
// Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
// Route::get('/category/show', [CategoryController::class, 'showCategory'])->name('category.show');
// Route::get('/product', [ProductController::class, 'index']);
// Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
// Route::post('/product/show', [ProductController::class, 'showProduct'])->name('product.show');


Route::middleware(['auth'])->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/show', [CategoryController::class, 'show'])->name('categories.show');
});

Route::get('/products/create/{category}', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/show', [ProductController::class, 'show'])->name('products.show');