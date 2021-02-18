<?php

namespace App\Listeners\ContactForm;

use App\Models\Message;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\ContactFormHasSubmittedEvent;

class SaveInMessagesTableListener implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  ContactFormHasSubmittedEvent  $event
     * @return void
     */
    public function handle(ContactFormHasSubmittedEvent $event)
    {
        Message::create($event->data);
    }
}
