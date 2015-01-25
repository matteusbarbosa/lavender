<?php
namespace Lavender\Admin\Handlers;

use Lavender\Support\Facades\Workflow;

class Login
{

    public function handle($data)
    {
        if(!\Account::admin()->logAttempt($data, $mustBeConfirmed = false)){

            if(\Account::admin()->isThrottled($data)){

                throw new \Exception(\Lang::get('account.alerts.too_many_attempts'));

            } elseif(\Account::admin()->existsButNotConfirmed($data)) {

                throw new \Exception(\Lang::get('account.alerts.instructions_sent'));

            }

            throw new \Exception(\Lang::get('account.alerts.wrong_credentials'));
        }

        Workflow::redirect('backend');
    }

}