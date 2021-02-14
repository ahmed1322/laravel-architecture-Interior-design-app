<?php

// Home Page
Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');

// Static Pages
Route::get('/{page}', App\Http\Controllers\Frontend\PagesController::class)->name('page')
    ->where( 'page' , 'contact' );

Route::post('/contact', [App\Http\Controllers\Frontend\HomeController::class, 'contact'])->name('home.contact');

// Comments
Route::post('/comment/{post}/user/{user}', [App\Http\Controllers\Frontend\CommentsController::class, 'store'])->name('comment.add');

// Portfolio
Route::get('/portfolio/{portfolio}/{slug}', [App\Http\Controllers\Frontend\PortfolioController::class, 'single'])->name('portfolio.single');
Route::get('/portfolios', [App\Http\Controllers\Frontend\PortfolioController::class, 'index'])->name('portfolios');

// Category
Route::get('/categories', [App\Http\Controllers\Frontend\CategoriesController::class, 'index'])->name('categories');
Route::get('/category/{category_portfolios}/portfolio/{slug}', [App\Http\Controllers\Frontend\CategoriesController::class, 'singleCategoryPortfolios'])->name('single.category.portfolios');
Route::get('/category/{category_posts}/{slug}/posts/', [App\Http\Controllers\Frontend\CategoriesController::class, 'singleCategoryPosts'])->name('single.category.posts');

require_once __DIR__ . '/blog.php';
