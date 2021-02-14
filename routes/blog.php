<?php

// Blog Page
Route::get('/blog', [ App\Http\Controllers\Frontend\BlogController::class , 'index' ])->name('blog');
// Single Post
Route::get('/post/{post}/{slug}', [ App\Http\Controllers\Frontend\BlogController::class, 'singlePost' ])->name('blog.single');
// Related Tag posts
Route::get('/tag/{slug}', [ App\Http\Controllers\Frontend\TagsController::class, 'singleTag' ])->name('tag.single');
// Author Posts
Route::get('/author/{user}/posts', [ App\Http\Controllers\Frontend\AuthorPostsController::class, 'authorPosts' ])->name('author.post');
//  Posts by Date
Route::get('/date/{date}/posts', [ App\Http\Controllers\Frontend\DatePostsController::class, 'datePosts' ])->name('date.post');
