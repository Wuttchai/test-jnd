<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

 
/* Route::get('/registers', [UserController::class, 'showRegistrationForm']); */
/* Route::post('/register', [UserController::class, 'register'])->name('register');
  
Route::get('/registers', function () {
    return view('auth.register');
});


Route::get('/login', [UserController::class, 'showLoginForm']);
Route::post('/login', [UserController::class, 'login'])->name('login'); */