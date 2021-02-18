<?php

namespace App\Mail\Comments;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewCommentMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $user;
    public $post;
    public $comment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $post, $comment)
    {
        $this->user = $user;
        $this->post = $post;
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.comments.new_comment') 
                    ->with([
                        'post_author' => $this->post->author->name,
                        'post_title' => $this->post->title,
                        'comment_owner' => $this->user->name,
                        'comment' => $this->comment,
                        'post_url' => route( 'blog.single' , [ 'post' => $this->post->id , 'slug' => $this->post->slug ] ),
                    ]);
    }
}
