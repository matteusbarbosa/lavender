<?php

namespace Lavender\Core\Controller;

class BaseController extends \Illuminate\Routing\Controller
{

    /**
     * Set up the layout.
     * 
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = \View::make($this->layout);
        }
    }

}
