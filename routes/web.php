<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
Route::get('/',function()
{
   
    return view('home');
}

);


Route::get('/register', [UserController::class, 'index']);
Route::post('/register/store', [UserController::class, 'store']);
Route::get('/login', [LoginController::class,'index']);
Route::post('/loginMatch', [LoginController::class,'login'])->name('loginMatch');
Route::get('/dashboard', [LoginController::class,'dashboardPage'])->name('dashboard');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');
Route::get('/edit/{id}', [UserController::class,'edit'])->name('edit');
Route::put('/update/{id}', [UserController::class,'update'])->name('update');
Route::delete('/delete{id} ',[UserController::class,'delete'])->name('delete');
Route::get('/search-user', [UserController::class, 'searchUser']);
