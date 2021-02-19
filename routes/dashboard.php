<?php

/**
 * Dashboard Routes
 *
 * All Dashboard Routes Lives Here
 *
 */

// Related To Dashbnoard Area Routes
Route::middleware(['auth', 'dashboard.auth'])->prefix('dashboard')->group(function () {

    // Dashborad Page
    Route::get('/', [ App\Http\Controllers\Dashboard\DashboardController::class , 'index' ])->name('dashboard');

    Route::resource('/comments', App\Http\Controllers\Dashboard\CommentsController::class)->except(['show']);

    Route::get( '/comments/{post}' , [ App\Http\Controllers\Dashboard\CommentsController::class , 'show' ] )->name('comments.show');

    // Profile Routes
    Route::resource('/profile', App\Http\Controllers\Dashboard\AdminProfileController::class);

    // Category Routes
    Route::resource('/category', App\Http\Controllers\Dashboard\CategoriesController::class)->except(['destroy', 'edit']);

    // Posts Index Page => the rest used in API
    Route::resource('/post', App\Http\Controllers\Dashboard\PostsController::class);

    // Tag Routes
    Route::resource('/tag', App\Http\Controllers\Dashboard\TagsController::class);

    Route::middleware('admin.auth')->group(function () {

        // Settings Routes
        Route::resource('/settings', App\Http\Controllers\Dashboard\AppSettingsController::class);

        // User Permissions Routes
        Route::resource('/user', App\Http\Controllers\Dashboard\UserPermissionsController::class);

        Route::get('/user/admins', [  App\Http\Controllers\Dashboard\UserPermissionsController::class , 'admins' ] )->name('user.admins');

        Route::put('/user/{user}/role/{role}', [  App\Http\Controllers\Dashboard\UserPermissionsController::class , 'addRole' ] )->name('user.addRole');

        Route::delete('/permission/{user}/{role}', [ App\Http\Controllers\Dashboard\UserPermissionsController::class ,'remove'])->name('user.remove.role');

        // Role Routes
        Route::resource('/role', App\Http\Controllers\Dashboard\UsersRoleController::class);

    });


});

// Related To Dashbnoard && Site
Route::middleware(['auth', 'dashboard.auth', 'admin.auth'])->prefix('dashboard')->group(function () {

    // Slider Routes
    Route::resource('/slider', App\Http\Controllers\Dashboard\SliderController::class);
    Route::DELETE('/slider/destroyAll', [ App\Http\Controllers\Dashboard\SliderController::class, 'destroyAll' ])->name('slider.destroyAll');

    // Portfolio Routes
    Route::resource('/portfolio', App\Http\Controllers\Dashboard\PortfolioController::class);
    Route::DELETE('/portfolio/destroyAll', [ App\Http\Controllers\Dashboard\PortfolioController::class, 'destroyAll' ])->name('portfolio.destroyAll');

    // Service Routes
    Route::resource('/service', App\Http\Controllers\Dashboard\ServicesController::class);
    Route::DELETE('/service/destroyAll', [ App\Http\Controllers\Dashboard\ServicesController::class, 'destroyAll' ])->name('service.destroyAll');

    // Testimonial Routes
    Route::resource('/testimonial', App\Http\Controllers\Dashboard\TestimonialsController::class);
    Route::DELETE('/testimonial/remove', [ App\Http\Controllers\Dashboard\TestimonialsController::class, 'removeAllTestimonials' ])->name('testimonial.removeAll');

    // Team Routes
    Route::resource('/team', App\Http\Controllers\Dashboard\TeamsController::class);
    Route::DELETE('/team/destroyAll', [ App\Http\Controllers\Dashboard\TeamsController::class, 'destroyAll' ])->name('team.destroyAll');

});
