<?php namespace Lavender\Menu\Services;

use Lavender\Support\ContentHierarchy;

class MenuBuilder extends ContentHierarchy
{
    protected $layout = 'menu.container';

    protected $allowed_types = [
        'frontend',
        'backend',
    ];

}
