<?php
namespace Lavender\Contact;

use Illuminate\Support\ServiceProvider as CoreServiceProvider;


class ContactServiceProvider extends CoreServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }



    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('lavender/contactform', 'contactform', realpath(__DIR__));
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->events->listen(
            'workflow.contactform.show_form.before',
            'Lavender\Contact\Handlers\PrepareEmail@handle'
        );

        $this->app->events->listen(
            'workflow.contactform.show_form.after',
            'Lavender\Contact\Handlers\SendResponse@handle'
        );
    }



}

