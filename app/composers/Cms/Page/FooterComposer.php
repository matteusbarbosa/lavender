<?php
namespace Lavender\Cms\Page;

class FooterComposer
{

    public function compose($view)
    {
        $view->with('copyright', sprintf("Copyright &copy; Lavender Inc All rights reserved."));
    }

}