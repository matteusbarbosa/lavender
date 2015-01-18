<?php
namespace Lavender\Customer\Handlers;


use Illuminate\Support\Facades\Lang;
use Lavender\Support\Facades\Account;
use Lavender\Support\Facades\Message;
use Lavender\Support\Facades\Workflow;

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

        Workflow::redirect('account/login');
    }
}