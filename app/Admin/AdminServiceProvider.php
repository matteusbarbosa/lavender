<?php
namespace Lavender\Admin;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
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
        $this->package('lavender/admin', 'admin', realpath(__DIR__));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerInstaller();

        $this->registerListeners();
    }

    /**
     * Register view installer
     */
    private function registerInstaller()
    {
        $this->app->installer->update('add_admin_account', function ($console){

            // If a default theme doesn't exist, create it now
            if(!entity('admin')->all()->count()){

                $console->call('lavender:admin');

            }
        }, 50);
    }

    private function registerListeners()
    {
        $this->app->events->listen(
            'workflow.admin_login.login.after',
            'Lavender\Admin\Handlers\Login@handle'
        );
    }
}