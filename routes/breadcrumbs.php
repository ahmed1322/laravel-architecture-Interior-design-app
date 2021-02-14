<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > Contact
Breadcrumbs::for('contact', function ($trail) {
    $trail->parent('home');
    $trail->push('Contact', route( 'page','contact'));
});

// Home > Portfolio
Breadcrumbs::for('portfolios', function ($trail) {
    $trail->parent('home');
    $trail->push('portfolios', route('portfolios'));
});

// Home > Portfolio > [Portfolio]
Breadcrumbs::for('portfolio', function ($trail, $portfolio) {
    $trail->parent('portfolios');
    $trail->push($portfolio->title, route('portfolio.single', [ 'portfolio' => $portfolio->id , 'slug' => $portfolio->slug ] ));
});

// Home > Blog
Breadcrumbs::for('blog', function ($trail) {
    $trail->parent('home');
    $trail->push('blog', route('blog'));
});

// Home > Blog > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('blog');
    $trail->push($post->title, route('blog.single', [ 'post' => $post->id , 'slug' => $post->slug ] ));
});