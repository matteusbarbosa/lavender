<?php
namespace Lavender\Cms;

class HomeComposer
{

    public function compose($view)
    {
        $view->with('page_title', sprintf("Lavender Home"));
    }

}