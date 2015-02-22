<?php
namespace App\Workflow\Handlers\Admin;

use App\Support\Facades\Message;
use Illuminate\Support\Facades\Auth;
use Lavender\Contracts\Workflow;

class AuthHandler
{
    public function login(Workflow $workflow)
    {
        $request = $workflow->request;

        if(!Auth::admin()->logAttempt($request, $mustBeConfirmed = false)){

            if(Auth::admin()->isThrottled($request)){

                $error = trans('account.alerts.too_many_attempts');

            } else {

                $error = trans('account.alerts.wrong_credentials');
            }

            Message::addError($error);

            throw new \Exception($error);

        }
    }

    public function reset_password(Workflow $workflow)
    {
        $request = $workflow->request;

        if(!Auth::customer()->resetPassword($request)){

            throw new \Exception(trans('account.alerts.wrong_password_reset'));
        }

        Message::addSuccess(trans('account.alerts.password_reset'));

    }

    public function forgot_password(Workflow $workflow)
    {
        $request = $workflow->request;

        if(!Auth::customer()->forgotPassword($request['email'])){

            $error = trans('account.alerts.wrong_password_forgot');

            Message::addError($error);

            throw new \Exception($error);
        }

        Message::addSuccess(trans('account.alerts.password_forgot'));

    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Workflow\Forms\Admin\Login',
            'App\Workflow\Handlers\Admin\AuthHandler@login'
        );

//        $events->listen(
//            'App\Workflows\Customer\ForgotPassword',
//            'App\Workflow\Handlers\Customer\AuthHandler@forgot_password'
//        );
//
//        $events->listen(
//            'App\Workflows\Customer\ResetPassword',
//            'App\Workflow\Handlers\Customer\AuthHandler@reset_password'
//        );
    }

}