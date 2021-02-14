<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Contact\StoreContactMsgRequest;
use App\Models\Category;
use App\Models\Message;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Team;
use App\Models\Testimonial;
use App\Services\Frontend\HomeServices;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HomeServices $HomeServices)
    {
        return view('home', [
            'sliders' => Slider::where('visible', true)->get(),
            'portfolios' => $portfolio = Portfolio::all(),
            'portfolios_categories' => $HomeServices->getPortfoliosCategories($portfolio),
            'categories' => Category::all(),
            'services' => Service::where('visible', true)->get(),
            'testimonials' => Testimonial::all(),
            'teams' => Team::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function contact(StoreContactMsgRequest $request)
    {
        // dd($request->validated());

        Message::create($request->validated());

        session()->flash('success_msg', 'Your Msg sent succssfully');

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
