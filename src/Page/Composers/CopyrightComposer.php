<?php
namespace Lavender\Page\Composers;

class CopyrightComposer
{

    private $lavender = "https://github.com/lavender/lavender";

    public function compose($view)
    {
        $view->with('copyright', sprintf(
            "&copy; %s  <a href=\"%s\">Lavender Commerce</a>",
            date('Y'),
            $this->lavender
        ));
    }

}