<?php

namespace App\Http\Controllers\Dashboard;
use App\Traits\Icons;
use App\Models\Service;
use App\Http\Controllers\Controller;
use App\Services\Dashboard\UpdateTable;
use App\Services\Dashboard\StoreInTable;
use App\Http\Requests\Dashboard\Site\Service\CreateServiceRequest;
use App\Http\Requests\Dashboard\Site\Service\UpdateServiceRequest;

class ServicesController extends Controller
{
    use Icons;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.site.service.index', [
            'services' => Service::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'dashboard.site.service.cuService', [
            'flat_icons' => $this->FlatIcons()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateServiceRequest $request, Service $service, StoreInTable $StoreInTable)
    {
        // Store New Service
        $StoreInTable
        ->setModel($service)
        ->setData($request->validated())
        ->setAppendToData([
            'slug' => str_slug($request->validated()['title']),
            'visible' => ! array_key_exists( 'visible' , $request->validated() )
                            ? 0 : $request->validated()['visible']
        ])
        ->setHas_file($request->hasFile('image'))
        ->setFile($request->file('image'))
        ->setDir($service::SERVICE_DIR_PATH)
        ->setKeyName()
        ->saveFile()
        ->create()
        ->flashSuccessMsg(''.$service->title.' Created Successfully');

        // Redirect to slider home page
        return redirect(route('service.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view( 'dashboard.site.service.cuService', [
            'service' => $service,
            'flat_icons' => $this->FlatIcons()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service, UpdateTable $UpdateTable)
    {
        // Updated Service
        $UpdateTable
        ->setModel($service)
        ->setData($request->validated())
        ->setAppendToData([
            'slug' => str_slug($request->validated()['title']),
            'visible' => ! array_key_exists( 'visible' , $request->validated() )
                            ? 0 : $request->validated()['visible']
        ])
        ->setHas_file($request->hasFile('image'))
        ->setFile($request->file('image'))
        ->setDir($service::SERVICE_DIR_PATH)
        ->setKeyName()
        ->saveFile()
        ->update()
        ->flashSuccessMsg(''.$service->title.' Updated Successfully');

        // Redirect to slider home page
        return redirect(route('service.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }

    /**
     * Remove All resources from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyAll()
    {
        //
    }
}
