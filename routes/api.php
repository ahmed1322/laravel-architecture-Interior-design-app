<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->prefix('dashboard/')->group(function () {

    Route::resource('/api-category', App\Http\Controllers\Dashboard\Api\CategoriesController::class )->except(['destroy', 'edit', 'update']);

    Route::get('/api-category/{category}/edit', [ App\Http\Controllers\Dashboard\Api\CategoriesController::class , 'edit' ] )->name('api-category.edit');

    Route::PUT('/api-category/{category}', [ App\Http\Controllers\Dashboard\Api\CategoriesController::class , 'update' ] )->name('api-category.update');

    Route::delete('/api-category/{category}', [ App\Http\Controllers\Dashboard\Api\CategoriesController::class , 'destroy' ] )->name('api-category.destroy');

    // Route::resource('/post', App\Http\Controllers\Dashboard\Api\PostsController::class );

});

Route::post('/login', [ App\Http\Controllers\Auth\Api\AuthController::class , 'login' ] )->name('api.login');
// Route::post('/logout', [ App\Http\Controllers\Dashboard\Api\AuthController::class , 'logout' ] )->name('api.logout');
// Route::post('/register', [ App\Http\Controllers\Dashboard\Api\AuthController::class , 'register' ] )->name('api.register');
