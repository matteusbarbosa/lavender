<?php
namespace Lavender\Frontend\Footer;

class CopyrightComposer
{

    public function compose($view)
    {
        $view->with('copyright', sprintf("&copy; %s Lavender, Inc.", date('Y')));
    }

}