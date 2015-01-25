<?php
namespace Lavender\Contact\Handlers;

use Lavender\Support\Facades\Account;

class PrepareEmail
{


    public function handle($view)
    {
        // if user is logged in, populate their email
        if($user = Account::customer()->get()) $view->fields['email']['value'] = $user->email;
    }


}