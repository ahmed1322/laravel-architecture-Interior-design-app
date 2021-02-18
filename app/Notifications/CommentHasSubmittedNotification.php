<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentHasSubmittedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;
    public $post;
    public $comment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $user, $post , $comment )
    {
        $this->user = $user;
        $this->post = $post;
        $this->comment = $comment;
        // dd( $this->comment );
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line($this->user->name . ' Has Commented on Your post ' . $this->post->title)
                    ->line( 'the Comment ')
                    ->line( $this->comment)
                    ->action('See Comments ', url(route( 'blog.single', [ 'post' => $this->post->id , 'slug' => $this->post->slug ] )));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
