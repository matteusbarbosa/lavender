<?php
namespace Lavender\Customer;

use Illuminate\Support\ServiceProvider;

class CustomerServiceProvider extends ServiceProvider
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
        $this->package('lavender/customer', 'customer', realpath(__DIR__));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->events->listen(
            'workflow.new_customer.register_customer.after',
            'Lavender\Customer\Handlers\Register@handle'
        );

        $this->app->events->listen(
            'workflow.existing_customer.login_customer.after',
            'Lavender\Customer\Handlers\Login@handle'
        );

        $this->app->events->listen(
            'workflow.forgot_password.request_reset.after',
            'Lavender\Customer\Handlers\ForgotPassword@handle'
        );

        $this->app->events->listen(
            'workflow.reset_password.do_reset.after',
            'Lavender\Customer\Handlers\ResetPassword@handle'
        );
    }


}