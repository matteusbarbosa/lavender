<?php
namespace Lavender\Core\Controller;

use Illuminate\Routing\Controller;

class BaseController extends Controller
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