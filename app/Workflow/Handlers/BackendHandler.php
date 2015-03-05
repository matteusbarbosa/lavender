<?php
namespace App\Workflow\Handlers;

use Lavender\Contracts\Workflow;

class BackendHandler
{
    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Workflow\Forms\Backend\Entity\Product',
            'App\Workflow\Handlers\Backend\EditProduct@handle_product'
        );
        $events->listen(
            'App\Workflow\Forms\Backend\Entity\Product\Categories',
            'App\Workflow\Handlers\Backend\EditProduct@handle_categories'
        );
        $events->listen(
            'App\Workflow\Forms\Backend\Entity\Category',
            'App\Workflow\Handlers\Backend\EditCategory@handle_category'
        );
        $events->listen(
            'App\Workflow\Forms\Backend\Config\General',
            'App\Workflow\Handlers\Backend\EditConfig@handle_general'
        );
        $events->listen(
            'App\Workflow\Forms\Backend\Config\Account',
            'App\Workflow\Handlers\Backend\EditConfig@handle_account'
        );
    }

}