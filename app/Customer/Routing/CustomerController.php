<?php
namespace Lavender\Customer\Routing;

use Illuminate\Routing\Controller;

class CustomerController extends Controller
{

    /**
     * Attempt to confirm account with code
     *
     * @param  string $code
     *
     * @return  \Illuminate\Http\Response
     */
    public function confirm($code)
    {
        if(\Account::customer()->confirmByCode($code)){

            \Message::addSuccess(\Lang::get('account.alerts.confirmation'));
        } else{

            \Message::addError(\Lang::get('account.alerts.wrong_confirmation'));
        }

        return \Redirect::to('customer/login');
    }

    /**
     * Log the user out of the application.
     *
     * @return  \Illuminate\Http\Response
     */
    public function logout()
    {
        \Account::customer()->logout();

        return \View::make('customer.logout');
    }

    /**
     * Send token to our reset password field
     *
     * @param  string $token
     *
     * @return  \Illuminate\Http\Response
     */
    public function resetPassword($token)
    {
        // merge the requested token into our input
        \Input::merge(['token' => $token]);

        // flash the token to the session to be used by workflow fields
        \Input::flashOnly('token');

        return \Redirect::to('customer/reset_password');
    }

    /**
     * Shows the change password form with the given token
     *
     * @param  string $token
     *
     * @return  \Illuminate\Http\Response
     */
    public function doReset()
    {
        return \View::make('customer.reset_password');
    }
}
