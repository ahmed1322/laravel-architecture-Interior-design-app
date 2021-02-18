<?php
namespace App\Http\View\Composers;

use App\Models\Portfolio;
use Illuminate\View\View;

class RecentPortfolioComposer
{

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('recent_portfolios', Portfolio::latest()->take(3)->pluck('title', 'id'));
    }
}
