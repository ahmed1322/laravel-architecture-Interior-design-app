<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Dashboard\SearchServices;
use App\Http\Requests\Dashboard\Tags\CreateTagRequest;
use App\Http\Requests\Dashboard\Tags\UpdateTagRequest;


class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchServices $searchServices, Tag $tag)
    {

        if ( request()->user()->cannot('viewAny', Tag::class)) {
            abort(403);
        }

        return view( 'dashboard.dsb-tag.index', [
            'tags' => $tag->search('name')->doPaginate(5),
        ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        // Check User Create tag Permission
        if ( $request->user()->cannot('create', Tag::class)) {
            abort(403);
        }

        return view( 'dashboard.dsb-tag.cuTag' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {

        // Check User Create tag Permission
        if(  ! isset($request->user()->tag_roles()['c']) )
            return redirect()->back();

        // Store new tag
        $tag = Tag::create([
            'name' => $request->validated()['name'],
            'slug' => str_slug($request->validated()['name'])
        ]);

        session()->flash('success_msg', 'Tag '.$tag->name.' added successfully!!');

        return redirect(route('tag.index'));
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
    public function edit(Tag $tag,Request $request)
    {

        // Check User Update Tag Permission
        if ( $request->user()->cannot('view', $tag)) {
            abort(403);
        }

        return view( 'dashboard.dsb-tag.cuTag', [
            'tag' => $tag
        ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        // Check User Update Tag Permission
        if ( $request->user()->cannot('update', $tag)) {
            abort(403);
        }

        // Store new Category
        $tag->update([
            'name' => $request->validated()['name'],
            'slug' => str_slug($request->validated()['name'])
        ]);

        session()->flash('success_msg', 'Tag '.$tag->name.' Updated successfully!!');

        return redirect(route('tag.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag, Request $request)
    {
        // Check User Update Tag Permission
        if ( $request->user()->cannot('delete', $tag)) {
            abort(403);
        }

        $tag->posts()->detach($tag->posts()->pluck('id')->toArray());

        // // The Category has appended with post(s)
        if( $tag->posts->count() > 0 ){

            session()->flash('error_msg', 'Can`t Delete the Tag '.$tag->name.', the Tag has appened posts with');

            return redirect()->back();
        }

        $tag->delete();

        session()->flash('success_msg', 'Tag '.$tag->name.' Deleted successfully!!');

        return redirect(route('tag.index'));
    }
}
