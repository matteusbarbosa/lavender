<?php
namespace App\Providers;

use Lavender\Support\ServiceProvider;
use Lavender\Support\Facades\Workflow;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     * todo refactor into entity kernel
     *
     * @return void
     */
    public function register()
    {
        $base = $this->app->basePath();

        $path = $base.'/config/entity/';
        $this->mergeConfigFrom($path.'admin.php',               'entity');
        $this->mergeConfigFrom($path.'cart.php', 	            'entity');
        $this->mergeConfigFrom($path.'customer.php', 	        'entity');
        $this->mergeConfigFrom($path.'store.php',               'entity');
        $this->mergeConfigFrom($path.'category.php', 	        'entity');
        $this->mergeConfigFrom($path.'product.php',             'entity');
        $this->mergeConfigFrom($path.'theme.php',               'entity');
    }
}