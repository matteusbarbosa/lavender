<?php
namespace Lavender\Customer\Composers\Link;

class LoginComposer
{

    public function compose($view)
    {
        $user = \Account::customer()->get();

        $view->with('url', $user ? 'customer/logout' : 'customer/login');

        $view->with('label', $user ? 'Logout' : 'Login/Register');
    }

}