<?php
namespace Lavender\Contact\Handlers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Lavender\Support\Facades\Message;

class SendResponse
{

    public function handle($data)
    {
        Mail::queue(
            'emails.contact',
            ['comment' => $data['comment']],
            function ($message) use ($data) {
                $message
                    ->to(Config::get('mail.from.address'), Config::get('mail.from.name'))
                    ->from($data['email'])
                    ->subject(Lang::get('contactform::contactform.email.subject'));
        });
        Message::addSuccess(Lang::get('contactform::contactform.success.message'));
    }

}