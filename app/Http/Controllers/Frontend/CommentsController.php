<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Comments\PostCommentSubmittedEvent;
use App\Notifications\CommentHasSubmittedNotification;
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
        event( new PostCommentSubmittedEvent($user , $post , $request->validated()['comment'] ) );
        return redirect()->back();
    }

}
