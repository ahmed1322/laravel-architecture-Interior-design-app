<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Tag;
use App\Traits\Api;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Dashboard\ModelActions\UpdateTable;
use App\Services\Dashboard\ModelActions\StoreInTable;
use App\Http\Requests\Dashboard\Posts\CreatePostRequest;
use App\Http\Requests\Dashboard\Posts\UpdatePostRequest;
use App\Services\Dashboard\ModelActions\DeleteFromTable;

class PostsController extends Controller
{
    use Api;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if ( request()->user()->cannot('viewAny', Post::class)) {
            abort(403);
        }

        return view( 'dashboard.dsb-post.index', [
            'posts' =>  Post::search('title')
                        ->authorPosts()
                        ->doPaginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ( $request->user()->cannot('create', Post::class)) {
            abort(403);
        }

        // No Category to append post with
        if( Category::count() === 0 ){

            session()->flash('error_msg', 'Please add Category first, No Category to append posts with');
            return redirect(route('category.create'));
        }

        return view( 'dashboard.dsb-post.cuPost', [
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request,Post $post, StoreInTable $storeInTable)
    {
        // Check User Display All Category Permission
        if ( $request->user()->cannot('create', Post::class)) {
            abort(403);
        }

        // Store New Post
        $storeInTable
        ->setModel($post)
        ->authAuthorPosts([
            'title'         => $request->validated()['title'],
            'content'       => $request->validated()['content'],
            'category_id'   => $request->validated()['category_id'],
            'slug'          => str_slug($request->validated()['title']),
            'image'         => 'https://images.unsplash.com/photo-1593642634402-b0eb5e2eebc9?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MXwyMDYzODB8MXwxfGFsbHwxfHx8fHx8Mnw&ixlib=rb-1.2.1&q=80&w=1080'
        ])
        ->attachTags($request->validated()['tag_id'])
        ->flashSuccessMsg(''.$request->validated()['title'].' Created Successfully');

        return redirect( route('post.index') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post,Request $request)
    {

        if ( $request->user()->cannot('view', $post)) {
            abort(403);
        }

        return view( 'dashboard.dsb-post.cuPost', [
            'post' => $post,
            'tags' => Tag::all(),
            'model' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post, UpdateTable $updateTable)
    {
        // Check User Display All Category Permission
        if ( $request->user()->cannot('update', $post)) {
            abort(403);
        }

        $updateTable
        ->setModel($post)
        ->setData([
            'title' => $request->validated()['title'],
            'content' => $request->validated()['content'],
            'category_id' => $request->validated()['category_id']
        ])
        ->setData([$request->validated() , [ 'title', 'content', 'category_id' ] ])
        ->update()
        ->syncTags($request->validated()['tag_id'])
        ->flashSuccessMsg(''.$post->title.' Updated Successfully');

        return redirect( route('post.index') );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Post $post, DeleteFromTable $deleteFromTable)
    {
        // Check User delete a Post
        if ( $request->user()->cannot('delete', $post)) {
            abort(403);
        }

        $deleteFromTable
        ->setModel($post)
        ->detachTags()
        ->delete()
        ->flashSuccessMsg('Post  '.$post->title.' Deleted Successfully!!');

        return redirect( route('post.index') );
    }
}
