<?php

namespace App\Http\Controllers\Frontend;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Comments\CreateCommentRequest;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCommentRequest $request, Post $post, User $user)
    {
        $comment = $user->comments()->create([
            'comment' => $request->validated()['comment'],
            'post_id' => $post->id
        ]);

        session()->flash('success_msg', 'Comment Added Successfully');

        return redirect()->back();
    }

}
