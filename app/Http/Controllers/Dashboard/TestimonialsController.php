<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Testimonial;
use App\Http\Controllers\Controller;
use App\Services\Dashboard\ModelActions\UpdateTable;
use App\Services\Dashboard\ModelActions\StoreInTable;
use App\Services\Dashboard\ModelActions\DeleteFromTable;
use App\Http\Requests\Dashboard\Site\Testimonial\CreateTestimonialRequest;
use App\Http\Requests\Dashboard\Site\Testimonial\UpdateTestimonialRequest;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( 'dashboard.site.testimonial.index' , [
            'testimonials' => Testimonial::search('name')
                                ->doPaginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'dashboard.site.testimonial.cuTestimonial' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTestimonialRequest $request, Testimonial $testimonial, StoreInTable $StoreInTable)
    {
        // Store New Testimonial
        $StoreInTable
        ->setModel($testimonial)
        ->setData($request->validated())
        ->create()
        ->flashSuccessMsg(''.$request->validated()['name'].' Created Successfully');

        // Redirect to slider home page
        return redirect(route('testimonial.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('dashboard.site.testimonial.cuTestimonial', [
            'testimonial' => $testimonial
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial, UpdateTable $UpdateTable)
    {
        // Update Testimonial
        $UpdateTable
        ->setModel($testimonial)
        ->setData($request->validated())
        ->update()
        ->flashSuccessMsg(''.$testimonial->name.' Updated Successfully');

        // Redirect to Testimonial Dashboard page
        return redirect(route('testimonial.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial, DeleteFromTable $deleteFromTable)
    {
        // Delete Testimonial
        $deleteFromTable
        ->setModel($testimonial)
        ->delete()
        ->flashSuccessMsg(''.$testimonial->name.' Deleted Successfully');

        // Redirect to Testimonial Dashboard page
        return redirect(route('testimonial.index'));
    }

    /**
     * Remove All resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function removeAllTestimonials(){
        dd('Destroy All Testimonials');
    }
}
