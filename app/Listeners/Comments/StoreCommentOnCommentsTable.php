<?php

namespace App\Listeners\Comments;

use App\Events\Comments\PostCommentSubmittedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreCommentOnCommentsTable implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  PostCommentSubmittedEvent  $event
     * @return void
     */
    public function handle(PostCommentSubmittedEvent $event)
    {
        $event->new_comment = $event->user->comments()->create([
            'comment' => $event->comment,
            'post_id' => $event->post->id
        ]);
    }
}
