<?php
namespace App\Http\View\Composers;

use App\Models\Post;
use Illuminate\View\View;

class RecentPostsComposer
{

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('recent_posts', Post::latest()->take(5)->get());
    }
}
