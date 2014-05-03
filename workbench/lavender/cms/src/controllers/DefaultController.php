<?php

namespace Lavender\Cms;

use Lavender\Core\Controller\BaseController;

class DefaultController extends BaseController
{

    protected $layout = 'cms::default';

    /**
     * Main entry point.
     *
     * @return home page layout
     */
    public function getIndex()
    {
        return $this->layout;
    }

}
