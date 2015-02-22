<?php
namespace App\Workflow\Handlers;


use App\Support\Facades\Message;
use Illuminate\Support\Facades\Mail;

class ContactFormHandler
{

    public function handle($data)
    {
        $request = $data->request;

        Mail::queue(
            'emails.contact',
            ['comment' => $request['comment']],
            function ($message) use ($request) {
                $message
                    ->to(config('mail.from.address'), config('mail.from.name'))
                    ->from($request['email'])
                    ->subject(trans('contactform.email.subject'));
            });

        Message::addSuccess(trans('contactform.success.message'));
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Workflow\Forms\ContactForm',
            'App\Workflow\Handlers\ContactFormHandler@handle'
        );
    }

}