<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display Single post tags
     */

    public function singleTag($tagsSlug)
    {
        $tag = Tag::where('slug', $tagsSlug)->first();
        return view( 'frontend.blog', [ 'posts' => $tag->posts()->paginate(5) ] );
    }
}
