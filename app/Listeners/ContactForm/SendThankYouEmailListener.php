<?php

namespace App\Listeners\ContactForm;

use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\ContactFormHasSubmittedEvent;

class SendThankYouEmailListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  ContactFormHasSubmittedEvent  $event
     * @return void
     */
    public function handle(ContactFormHasSubmittedEvent $event)
    {
        Mail::to($event->data['email'])->send(new ContactFormMail($event->data));
    }
}
