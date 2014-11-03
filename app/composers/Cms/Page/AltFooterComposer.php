<?php
namespace Lavender\Cms\Page;

class AltFooterComposer
{

    public function compose($view)
    {
        $view->with('copyright', sprintf("Copyright &copy; Alt Inc All rights reserved."));
    }

}