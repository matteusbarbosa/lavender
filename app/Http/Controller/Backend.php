<?php
namespace App\Http\Controller;

use App\Events\Layout\LoadBackend;
use App\Support\Facades\Message;

abstract class Backend extends Base
{
    protected function loadLayout()
    {
        event(new LoadBackend($this));

        parent::loadLayout();
    }

    public function missingMethod($parameters = [])
    {
        Message::addError("Page not found.");

        compose_section('layouts.default', 'head.title', 'Not found');

        return view('layouts.default');
    }
}