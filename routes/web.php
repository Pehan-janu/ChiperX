<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChiperController;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Login;

Route::get('/', [ChiperController::class, 'index']);

//protected routes|

Route::middleware('auth')->group(function(){

    Route::post('/chiper', [ChiperController::class, 'store']);
    Route::get('/chiper/{chiper}/edit', [ChiperController::class, 'edit']);
    Route::put('/chiper/{chirp}', [ChiperController::class, 'update']);
    Route::delete('/chiper/{chiper}', [ChiperController::class, 'destroy']);

});


// Registration routes
Route::view('/register', 'auth.register')
    ->middleware('guest')
    ->name('register');
 
Route::post('/register', Register::class)
    ->middleware('guest');

 
// Logout route
Route::post('/logout', Logout::class)
    ->middleware('auth')
    ->name('logout');

    // Login routes
Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');
 
Route::post('/login', Login::class)
    ->middleware('guest');