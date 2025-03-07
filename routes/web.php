<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
Route::get('/',function()
{
   
    return view('home');
}

);





Route::controller(UserController::class)->group(function (){
    // Route::get('/register','index');
    // Route::post('/register/store','store');
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

