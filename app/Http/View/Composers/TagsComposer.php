<?php
namespace App\Http\View\Composers;

use App\Models\Tag;
use Illuminate\View\View;

class TagsComposer
{

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('tags', Tag::latest()->get());
    }
}
