<?php

namespace Lavender\Crm;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Lavender\Core\Controller\BaseController;

class UserController extends BaseController
{

    protected $layout = 'crm::user.login';

    public function __construct() {
        $this->beforeFilter('csrf', array('on'=>'post'));
        $this->beforeFilter('auth', array('only'=>array('getDashboard')));
    }

    public function getLogin()
    {
        return $this->layout;
    }

    public function getDashboard()
    {
        return $this->layout;
    }

    public function logoutAction()
    {
        Auth::logout();
        return Redirect::to(URL::previous());
    }

    public function loginAction()
    {
        //run authentication
        $authentication = Auth::attempt([
            'email' 	=> Input::get('email'),
            'password' 	=> Input::get('password'),
        ]);
        if ($authentication) {
            return Redirect::to('crm/user/account');
        } else {
            return Redirect::to(URL::previous());
        }
    }

    public function registerAction()
    {
        $validator = Validator::make(Input::all(), User::$rules);
        if ($validator->passes()) {
            $user = new User();
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->save();
            return $this->loginAction();
        }
        return Redirect::to(URL::previous())->withErrors($validator);
    }

}