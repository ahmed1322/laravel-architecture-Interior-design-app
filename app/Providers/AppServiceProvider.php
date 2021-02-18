<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Share Categories Between Specific Models
        View::composer('partials.Composers.Categories.*', \App\Http\View\Composers\CategoryComposer::class);
        // Share Portfolios Between Specific Models
        View::composer('partials.Composers.Portfolios.*', \App\Http\View\Composers\PortfolioComposer::class);
        // Share Recent Portfolios Between Specific Models
        View::composer('partials.Composers.Portfolios.*', \App\Http\View\Composers\RecentPortfolioComposer::class);
        // Share Recent Posts Between Specific Models
        View::composer('partials.Composers.Posts.*', \App\Http\View\Composers\RecentPostsComposer::class);
        // Share Recent Posts Between Specific Models
        View::composer('partials.Composers.Tags.*', \App\Http\View\Composers\TagsComposer::class);
    }
}
