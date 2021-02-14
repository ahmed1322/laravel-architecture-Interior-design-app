<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Dashboard\UpdateTable;
use Illuminate\Support\Facades\Storage;
use App\Services\Dashboard\StoreInTable;
use App\Http\Requests\Dashboard\Site\Portfolio\CreatePortfolioRequest;
use App\Http\Requests\Dashboard\Site\Portfolio\UpdatePortfolioRequest;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.site.portfolio.index', [
            'portfolios' => Portfolio::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'dashboard.site.portfolio.cuportfolio' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePortfolioRequest $request, Portfolio $portfolio, StoreInTable $StoreInTable)
    {

        // Store New Portfolio
        $StoreInTable
        ->setModel($portfolio)
        ->setData($request->validated())
        ->setHas_file($request->hasFile('image'))
        ->setFile($request->file('image'))
        ->setDir($portfolio::PORTFOLIO_DIR_PATH)
        ->setKeyName()
        ->saveFile()
        ->create()
        ->flashSuccessMsg(''.$request->validated()['title'].'  Created Successfully');

        // Redirect to Portfolio Dashboard
        return redirect(route('profile.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        return view( 'dashboard.site.portfolio.cuportfolio', [
            'portfolio' => $portfolio,
            'model' => $portfolio,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio, UpdateTable $UpdateTable)
    {
        // Update the Team Mebmer
        $UpdateTable
        ->setModel($portfolio)
        ->setData($request->validated())
        ->setHas_file($request->hasFile('image'))
        ->setFile($request->file('image'))
        ->setDir($portfolio::PORTFOLIO_DIR_PATH)
        ->setKeyName()
        ->saveFile()
        ->update()
        ->flashSuccessMsg(''.$portfolio->title.'  Updated Successfully');

        // Redirect to slider home page
        return redirect(route('portfolio.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        //
    }
}
