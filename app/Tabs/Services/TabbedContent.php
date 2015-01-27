<?php
namespace Lavender\Tabs\Services;

use Lavender\Support\ContentHierarchy;

class TabbedContent extends ContentHierarchy
{

    protected $layout = 'tabs.container';

    protected $allowed_types = [
        'entity_manager',
    ];

}