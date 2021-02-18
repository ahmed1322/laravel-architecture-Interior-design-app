<?php

namespace App\Listeners\ContactForm;

use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyAdminThatNewMessage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\ContactFormHasSubmittedEvent;

class NotifyAdminByEmailListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  ContactFormHasSubmittedEvent  $event
     * @return void
     */
    public function handle(ContactFormHasSubmittedEvent $event)
    {
        Mail::to('admin@admin.com')->send(new NotifyAdminThatNewMessage($event->data));
    }
}
