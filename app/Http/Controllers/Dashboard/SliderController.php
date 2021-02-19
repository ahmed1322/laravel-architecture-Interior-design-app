<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Slider;
use App\Http\Controllers\Controller;
use App\Services\Dashboard\SearchServices;
use App\Services\Dashboard\ModelActions\UpdateTable;
use App\Services\Dashboard\ModelActions\StoreInTable;
use App\Http\Requests\Dashboard\Site\CreateSliderRequest;
use App\Http\Requests\Dashboard\Site\UpdateSliderRequest;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchServices $searchServices)
    {
        return view('dashboard.dsb-slider.index' , [
            'sliders' => Slider::SliderSearch( $searchServices, auth()->user()->posts())
                        ->paginate(5)
                        ->appends(['search' => request()->query('search') ])
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.dsb-slider.cuSlider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSliderRequest $request, Slider $slider, StoreInTable $StoreInTable)
    {
        // Store New Service
        $StoreInTable
        ->setModel($slider)
        ->setData($request->validated())
        ->setHas_file($request->hasFile('image'))
        ->setFile($request->file('image'))
        ->setDir($slider::SLIDER_DIR_PATH)
        ->setKeyName()
        ->saveFile()
        ->create()
        ->flashSuccessMsg(''.$request->validated()['title'].' Created Successfully');

        // Redirect to slider home page
        return redirect(route('slider.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('dashboard.dsb-slider.cuSlider', [
            'slider' => $slider,
            'model' => $slider,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Site\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSliderRequest $request, Slider $slider, UpdateTable $UpdateTable)
    {
        // Update Slider
        $UpdateTable
        ->setModel($slider)
        ->setData($request->validated())
        ->setHas_file($request->hasFile('image'))
        ->setFile($request->file('image'))
        ->setDir($slider::SLIDER_DIR_PATH)
        ->setKeyName()
        ->saveFile()
        ->update()
        ->flashSuccessMsg(''.$slider->title.' Updated Successfully');

        // Redirect to slider home page
        return redirect(route('slider.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        //
    }

    /**
     * Remove All resource from storage.
     *
     * @param  \App\Models\Site\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroyAll(){
        //
    }
}
