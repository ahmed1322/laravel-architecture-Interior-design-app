<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Frontend\ModelAccessor\PostAccessor;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( 'frontend.blog.index', [
            'meta_title' => 'Blog',
            'posts' => Post::orderBy('created_at', 'desc')->paginate(5)
        ]);
    }

    /**
     * Display Single post
     */

    public function singlePost(Post $post)
    {
        return view( 'frontend.blog.single', [
            'meta_title' => 'Single Post',
            'post' => $post,
            'next' => PostAccessor::nextSiblings($post),
            'prev' => PostAccessor::prevSiblings($post),
            'related' => PostAccessor::relatedByCategory($post)
        ] );
    }
}
