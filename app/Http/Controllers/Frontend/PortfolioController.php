<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Portfolio;
use App\Http\Controllers\Controller;
use App\Services\Frontend\HomeServices;
use App\Services\Frontend\ModelAccessor\PortfolioAccessor;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HomeServices $HomeServices)
    {

        return view('frontend.portfolio.index', [
            'meta_title' => 'portfolios',
            'portfolios' => $portfolio = Portfolio::paginate(5),
            'add_filtration' => true,
            'portfolios_categories' => $HomeServices->getPortfoliosCategories($portfolio),
            'add_pagination' => true,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function single(Portfolio $portfolio)
    {
        return view('frontend.portfolio.single' , [
            'meta_title' => 'Single Portfolio',
            'portfolio' => $portfolio,
            'prev' => PortfolioAccessor::prevSiblings($portfolio),
            'next' => PortfolioAccessor::nextSiblings($portfolio),
            'related' => PortfolioAccessor::relatedByCategory( $portfolio )
        ]);
    }

}
