<?php
namespace Lavender\Customer\Handlers;

use Illuminate\Support\Facades\Lang;
use Lavender\Support\Facades\Account;
use Lavender\Support\Facades\Message;
use Lavender\Support\Facades\Workflow;

class ForgotPassword
{

    /**
     * @param $data
     * @throws \Exception
     */
    public function handle($data)
    {
        if(!Account::customer()->forgotPassword($data['email'])){

            throw new \Exception(Lang::get('account.alerts.wrong_password_forgot'));
        }

        Message::addSuccess(Lang::get('account.alerts.password_forgot'));

        Workflow::redirect('account/login');
    }
}