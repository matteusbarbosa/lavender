<?php
namespace Lavender\Customer\Handlers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Lavender\Support\Facades\Account;
use Lavender\Support\Facades\Message;
use Lavender\Support\Facades\Workflow;

class Login
{

    public function handle($request)
    {
        if(!Account::customer()->logAttempt($request, Config::get('store.signup_confirm'))){

            if(Account::customer()->isThrottled($request)){

                Message::addError(Lang::get('account.alerts.too_many_attempts'));

            } elseif(Account::customer()->existsButNotConfirmed($request)){

                Message::addError(Lang::get('account.alerts.instructions_sent'));

            }

            Message::addError(Lang::get('account.alerts.wrong_credentials'));

        }

        Workflow::redirect('account/dashboard');
    }
}