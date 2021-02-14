<?php
namespace App\Http\View\Composers;

use App\Models\Portfolio;
use Illuminate\View\View;

class PortfolioComposer
{

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('portfolios', Portfolio::all()->pluck('title', 'id')->toArray());
    }
}
