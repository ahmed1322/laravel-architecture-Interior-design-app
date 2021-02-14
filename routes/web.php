<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

// Route::get('/login', [ App\Http\Controllers\CustomAuth\AuthController::class , 'login' ] )->name('login');
// Route::get('/logout', [ App\Http\Controllers\CustomAuth\AuthController::class , 'logout' ] )->name('logout');
// Route::get('/register', [ App\Http\Controllers\CustomAuth\AuthController::class , 'register' ] )->name('register');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

require_once __DIR__ . '/dashboard.php';

require_once __DIR__ . '/frontend.php';
