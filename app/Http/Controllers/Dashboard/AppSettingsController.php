<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use App\Services\Dashboard\UpdateTable;
use Illuminate\Support\Facades\Storage;
use App\Services\Dashboard\StoreInTable;
use App\Http\Requests\Dashboard\settings\CreateAppSettingsRequest;
use App\Http\Requests\Dashboard\settings\UpdateAppSettingsRequest;

class AppSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( 'dashboard.dsb-setting.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAppSettingsRequest $request, Setting $setting, StoreInTable $StoreInTable)
    {

        // Store New Settings
        $StoreInTable
        ->setModel($setting)
        ->setData($request->validated())
        ->setDir($setting::SETTING_DIR_PATH)
        ->setHas_file($request->hasFile('site_logo_light'))
        ->setFile($request->file('site_logo_light'))
        ->setKeyName('site_logo_light')
        ->saveFile()
        ->setHas_file($request->hasFile('site_logo_dark'))
        ->setFile($request->file('site_logo_dark'))
        ->setKeyName('site_logo_dark')
        ->setFileToDelete($setting->site_logo_dark)
        ->saveFile()
        ->create()
        ->flashSuccessMsg('Settings Created Successfully !!');


        return redirect()->back();
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
    public function update(UpdateAppSettingsRequest $request, Setting $setting , UpdateTable $UpdateTable)
    {
        // Update the Settings
        $UpdateTable
        ->setModel($setting)
        ->setData($request->validated())
        ->setDir($setting::SETTING_DIR_PATH)
        ->setHas_file($request->hasFile('site_logo_light'))
        ->setFile($request->file('site_logo_light'))
        ->setKeyName('site_logo_light')
        ->setFileToDelete($setting->site_logo_light)
        ->saveFile()
        ->setHas_file($request->hasFile('site_logo_dark'))
        ->setFile($request->file('site_logo_dark'))
        ->setKeyName('site_logo_dark')
        ->setFileToDelete($setting->site_logo_dark)
        ->saveFile()
        ->update()
        ->flashSuccessMsg('Settings Updated Successfully !!');

        return redirect()->back();

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
