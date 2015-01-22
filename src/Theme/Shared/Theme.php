<?php
namespace Lavender\Theme\Shared;

use Lavender\Support\Contracts\EntityInterface;
use Lavender\Support\SharedEntity;

class Theme extends SharedEntity
{
    public $count = 0;

    function __construct($theme = null)
    {
        if(!$theme instanceof EntityInterface) throw new \Exception('Theme not defined.');

        $this->setTheme($theme);
    }

    public function setTheme(EntityInterface $theme)
    {
        $this->setEntity($theme);
    }

}