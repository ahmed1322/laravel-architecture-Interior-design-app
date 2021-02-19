<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Team;
use App\Http\Controllers\Controller;
use App\Services\Dashboard\SearchServices;
use App\Services\Dashboard\ModelActions\StoreInTable;
use App\Services\Dashboard\ModelActions\DeleteFromTable;
use App\Http\Requests\Dashboard\Site\Team\CreateTeamRequest;
use App\Http\Requests\Dashboard\Site\Team\UpdateTeamRequest;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchServices $searchServices)
    {
        return view( 'dashboard.site.team.index' , [
            'teams' => Team::TeamSearch($searchServices)
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
        return view( 'dashboard.site.team.cuTeam');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTeamRequest $request,Team $team, StoreInTable $StoreInTable)
    {

        // Store New Team Mebmer
        $StoreInTable
        ->setModel($team)
        ->setData($request->validated())
        ->setSlug(str_slug($request->validated()['name']))
        ->setHas_file($request->hasFile('image'))
        ->setFile($request->file('image'))
        ->setDir($team::TEAM_DIR_PATH)
        ->setKeyName()
        ->saveFile()
        ->create()
        ->flashSuccessMsg(''.$request->validated()['name'].'  Created Successfully');

        // Redirect to slider home page
        return redirect(route('team.index'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view( 'dashboard.site.team.cuTeam' , [
            'team' => $team,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Team $team)
    public function update(UpdateTeamRequest $request, Team $team, UpdateTable $UpdateTable)
    {
        // Update the Team Mebmer
        $UpdateTable
        ->setModel($team)
        ->setData($request->validated())
        ->setHas_file($request->hasFile('image'))
        ->setFile($request->file('image'))
        ->setDir($team::TEAM_DIR_PATH)
        ->setKeyName()
        ->saveFile()
        ->update()
        ->flashSuccessMsg(''.$team->name.'  Updated Successfully');

        // Redirect to slider home page
        return redirect(route('team.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team, DeleteFromTable $deleteFromTable)
    {
        // Delete Testimonial
        $deleteFromTable
        ->setModel($team)
        ->delete()
        ->flashSuccessMsg(''.$team->name.' Deleted Successfully');

        // Redirect to Team Dashboard page
        return redirect(route('team.index'));
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
