<?php
namespace Lavender\Admin\Handlers;

use Lavender\Support\Facades\Message;

class Login
{

    public function handle($data)
    {
        if(!\Account::admin()->logAttempt($data, $mustBeConfirmed = false)){

            if(\Account::admin()->isThrottled($data)){

                $error = \Lang::get('account.alerts.too_many_attempts');

            } elseif(\Account::admin()->existsButNotConfirmed($data)) {

                $error = \Lang::get('account.alerts.instructions_sent');

            } else {

                $error = \Lang::get('account.alerts.wrong_credentials');

            }

            Message::addError($error);

            throw new \Exception($error);
        }

    }

}