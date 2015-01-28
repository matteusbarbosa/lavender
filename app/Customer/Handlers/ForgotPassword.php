<?php
namespace Lavender\Customer\Handlers;

use Illuminate\Support\Facades\Lang;
use Lavender\Support\Facades\Account;
use Lavender\Support\Facades\Message;

class ForgotPassword
{

    /**
     * @param $data
     * @throws \Exception
     */
    public function handle($data)
    {
        if(!Account::customer()->forgotPassword($data['email'])){

            $error = Lang::get('account.alerts.wrong_password_forgot');

            Message::addError($error);

            throw new \Exception($error);
        }

        Message::addSuccess(Lang::get('account.alerts.password_forgot'));
    }
}