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
            'App\Workflow\Handlers\Backend\EditProduct'
        );
    }

}