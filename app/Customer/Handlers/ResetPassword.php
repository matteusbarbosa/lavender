<?php
namespace Lavender\Customer\Handlers;


use Illuminate\Support\Facades\Lang;
use Lavender\Support\Facades\Account;
use Lavender\Support\Facades\Message;

class ResetPassword
{
    /**
     * @param $data
     * @throws \Exception
     */
    public function handle($data)
    {

        if(!Account::customer()->resetPassword($data)){

            throw new \Exception(Lang::get('account.alerts.wrong_password_reset'));
        }

        Message::addSuccess(Lang::get('account.alerts.password_reset'));
    }
}