<?php

namespace App\Listeners\Comments;

use Illuminate\Support\Facades\Mail;
use App\Mail\Comments\NewCommentMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Comments\PostCommentSubmittedEvent;
use App\Notifications\CommentHasSubmittedNotification;

class NotificationCommentHasSubmitted
{
    //  
    /**
     * Handle the event.
     *
     * @param  PostCommentSubmittedEvent  $event
     * @return void
     */
    public function handle(PostCommentSubmittedEvent $event)
    {
        Mail::to($event->post->author->email)->send(new NewCommentMail($event->user, $event->post, $event->comment));
    }
}
