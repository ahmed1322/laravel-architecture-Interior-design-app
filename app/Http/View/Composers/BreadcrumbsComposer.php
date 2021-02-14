<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class BreadcrumbsComposer
{

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('Breadcrumbs', $this->InitRoute() );
    }

    private function InitRoute()
    {
        return [

            'blog' => route('blog')

        ];
    }

}
