<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorPostsController extends Controller
{
    /**
     * Display Author posts
     */
    public function authorPosts($author_id)
    {
        $posts = Post::where('author_id', $author_id)->paginate(5);
        return view( 'frontend.blog', [ 'posts' => $posts ] );
    }
}
