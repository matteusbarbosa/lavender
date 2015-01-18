<?php
namespace Lavender\Page\Composers;

class CopyrightComposer
{

    public function compose($view)
    {
        $view->with('copyright', sprintf("&copy; %s Lavender, Inc.", date('Y')));
    }

}