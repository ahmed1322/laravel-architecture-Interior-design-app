<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DatePostsController extends Controller
{
    /**
     * Display posts by Date
     */
    public function datePosts($date)
    {
        $posts = Post::where('created_at', 'LIKE', "%$date%")->paginate(5);
        return view( 'frontend.blog', [ 'posts' => $posts ] );
    }
}
