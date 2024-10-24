<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

  Auth::routes(); 


Route::get('/register', function () {
return view('auth.register');
})->name('register');
Route::post('/register', [App\Http\Controllers\UserController::class, 'register'])->name('register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('urls', App\Http\Controllers\UrlController::class)
->middleware(['auth', 'verified']);

/* Route::middleware('auth')->group(function () {
    Route::get('/urls.index', [App\Http\Controllers\UrlController::class, 'index'])->name('urls.index');
    Route::post('/urls.store', [App\Http\Controllers\UrlController::class, 'store'])->name('urls.store');
    Route::get('/urls.edit', [App\Http\Controllers\UrlController::class, 'edit'])->name('urls.edit');
}); */

 Route::get('{shortener_url}', [App\Http\Controllers\UrlController::class, 'shortenLink'])->name('shortener-url');
