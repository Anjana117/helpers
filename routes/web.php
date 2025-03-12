<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\BookIssueController;
use App\Http\Controllers\StudentController;

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
    Route::post('/logout', 'logout')->name('logout');
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


Route::prefix('books')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('books.index');
    Route::get('/show', [BookController::class, 'show'])->name('books.show');
    Route::post('/', [BookController::class, 'store'])->name('books.store');


    Route::prefix('category')->group(function () {
        Route::get('/', [BookCategoryController::class, 'index'])->name('books.category.index');
        Route::post('/store', [BookCategoryController::class, 'store'])->name('books.category.store');
        Route::get('/show', [BookCategoryController::class, 'show'])->name('books.category.show');
    });
});
Route::get('/students',[StudentController::class,'index']);
Route::post('/students/store',[StudentController::class, 'store'])->name('students.store');
Route::get('/students/view',[StudentController::class,'view']);

Route::get('/bookissue',[BookIssueController::class,'show']);
Route::get('
',[BookIssueController::class,'index']);

Route::post('/bookissue/store',[BookIssueController::class, 'store'])->name('book_issues.store');
Route::post('book_issues/{id}/return', [BookIssueController::class, 'returnBook'])->name('book_issues.return');




