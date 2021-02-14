<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display Single Category Portfolios
     */

    public function singleCategoryPortfolios(Category $category_portfolios, $slug)
    {
        return view('frontend.portfolio.index', [
            'portfolios' => $category_portfolios->portfolios()->paginate(5),
            'add_pagination' => true,
        ]);
    }

    /**
     * Display Single Category Posts
     */
    public function singleCategoryPosts(Category $category_posts, $slug)
    {
        return view('frontend.blog', [
            'posts' => $category_posts->posts()->paginate(5),
        ]);

    }

}
