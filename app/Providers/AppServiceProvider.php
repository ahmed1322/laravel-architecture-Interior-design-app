<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\CategoryComposer;
use App\Http\View\Composers\PortfolioComposer;

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
        View::composer('partials.Composers.Categories.*', CategoryComposer::class);
        // Share Portfolios Between Specific Models
        View::composer('partials.Composers.Portfolios.*', PortfolioComposer::class);
    }
}
