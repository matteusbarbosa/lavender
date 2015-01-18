<?php
namespace Lavender\Backend\Handlers;

use Illuminate\Support\Facades\Redirect;
use Lavender\Support\Facades\Account;

class BeforeBackend
{

    public function filter()
    {

        if(!Account::admin()->get()){

            return Redirect::intended('backend/login');

        }

    }

}