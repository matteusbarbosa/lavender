<?php
namespace Lavender\Customer\Handlers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Lavender\Support\Facades\Account;
use Lavender\Support\Facades\Message;

class Login
{

    public function handle($request)
    {
        if(!Account::customer()->logAttempt($request, Config::get('store.signup_confirm'))){

            if(Account::customer()->isThrottled($request)){

                $error = Lang::get('account.alerts.too_many_attempts');

            } elseif(Account::customer()->existsButNotConfirmed($request)){

                $error = Lang::get('account.alerts.instructions_sent');

            } else {

                $error = Lang::get('account.alerts.wrong_credentials');
            }

            Message::addError($error);

            throw new \Exception($error);

        }

    }
}