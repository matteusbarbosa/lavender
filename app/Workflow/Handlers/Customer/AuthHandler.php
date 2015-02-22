<?php
namespace App\Workflow\Handlers\Customer;

use App\Support\Facades\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Lavender\Contracts\Workflow;

class AuthHandler
{
    public function login(Workflow $workflow)
    {
        $request = $workflow->request;

        if(!Auth::customer()->logAttempt($request, config('store.signup_confirm'))){

            if(Auth::customer()->isThrottled($request)){

                $error = trans('account.alerts.too_many_attempts');

            } elseif(Auth::customer()->existsButNotConfirmed($request)){

                $error = trans('account.alerts.instructions_sent');

            } else {

                $error = trans('account.alerts.wrong_credentials');
            }

            Message::addError($error);

            throw new \Exception($error);

        }

    }

    public function register(Workflow $workflow)
    {

        $request = $workflow->request;

        if(!Auth::customer()->findByEmail($request['email'])){

            try{
                Auth::customer()->register($request);

            }catch (\Exception $e){
                dd($e->getMessage());
            }
            $user = Auth::customer()->findByEmail($request['email']);

            if($user->id){

                if(config('store.signup_email')){

                    Mail::queueOn(
                        'default',
                        config('store.email_account_confirmation'),
                        compact('user'),
                        function ($message) use ($user){
                            $message->to($user->email)->subject(trans('account.email.confirmation.subject'));
                        }
                    );

                    Message::addSuccess(trans('account.alerts.instructions_sent'));
                } else{

                    Message::addSuccess(trans('account.alerts.account_created'));
                }
            } else{

                $error = implode(PHP_EOL, $user->errors()->all(':message'));

                Message::addError($error);

                throw new \Exception($error);
            }
        } else{

            $error = trans('account.alerts.duplicated_credentials');

            Message::addError($error);;

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
            'App\Workflow\Forms\Customer\Register\NewCustomer',
            'App\Workflow\Handlers\Customer\AuthHandler@register'
        );

        $events->listen(
            'App\Workflow\Forms\Customer\Login',
            'App\Workflow\Handlers\Customer\AuthHandler@login'
        );

        $events->listen(
            'App\Workflow\Forms\Customer\ForgotPassword',
            'App\Workflow\Handlers\Customer\AuthHandler@forgot_password'
        );

        $events->listen(
            'App\Workflow\Forms\Customer\ResetPassword',
            'App\Workflow\Handlers\Customer\AuthHandler@reset_password'
        );
    }

}