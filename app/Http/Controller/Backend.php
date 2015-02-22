<?php
namespace App\Http\Controller;

use App\Events\Layout\LoadBackend;

abstract class Backend extends Base
{
    protected function loadLayout()
    {
        event(new LoadBackend($this));

        parent::loadLayout();
    }
}