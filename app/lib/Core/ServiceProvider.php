<?php
namespace Lavender\Core;

use Illuminate\Support\ServiceProvider as CoreServiceProvider;

class ServiceProvider extends CoreServiceProvider
{
    /**
     * Domain-level application scope object:
     *  Used to define websites and stores.
     *  Entity attribute data can be unique for each store id.
     *
     * @var \Lavender\Core\Database\Entity $store
     * @internal this has values $id, $code, $name, $url
     */
    protected $store;

    /**
     * Subdomain-level application scope object:
     *  Used to segment a store's catalog to define alternate
     *   functionality for core features such as search and checkout.
     *  Entity attribute data can be unique for each department id.
     *
     * @var \Lavender\Core\Database\Entity $department
     * @internal this has parent $store and values $id, $code, $name,
     *  $store_id, $path
     */
    protected $department;

    /**
     * Session-level application scope object:
     *  Used to describe themes, locales.
     *
     * @var \Lavender\Core\Database\Entity $theme
     * @internal this has parent $department and values $id, $code,
     *  $name, $department_id.
     */
    protected $theme;

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('lavender/core');

        // First we want to merge default entity configs with
        // custom entity data configured per each module.
        $this->defaults();

        // todo modules/migrations - need to figure out when to include a module's entity data

        // todo register event listeners

        // Next let's bind these entities to the application
        // so we can easily create them later.
        $this->entities();

        // Now we perform some checks here to determine which $store,
        // $department, and $view to prioritize in our Builder.
        $this->scope();

        // Finally, we can now load the routes, filters, and view composers assigned
        // to the scope, let's build them now so the app can finish booting.
        $this->themes();
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // todo bind stuff
    }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }


    /**
     * View composers, routes, and route filters.
     */
    public function themes()
    {
        // todo load theme inheritance
        // todo view composers, filters

        foreach($this->app->config['routes'][$this->store->code] as $key => $values){

            if($key == 'methods'){

                foreach($values as $method => $routes){

                    foreach($routes as $path => $controllerAction){

                        if($method == 'post'){

                            \Route::post($path, $controllerAction);

                        } else {

                            \Route::get($path, $controllerAction);

                        }

                    }

                }

            }

        }
    }


    /**
     * Describe the scope for this request
     *
     * @return void
     */
    protected function scope()
    {
        /**
         * Match request url to domain to initialize $store
         */
        $request_url = $this->app->request->url();

        foreach($this->app->make('store')->all() as $store){

            if(!!(strpos($request_url, $store->url))){

                $this->store = $store;

            }

        }

        if(!isset($this->store)){

            $this->store = $this->app->make('store')->findByAttribute('code', 'default');

        }

        /**
         * Match request subdomain to initialize $department
         */

        $host = explode('.', parse_url($request_url)['host']);

        $path = array_slice($host, 0, count($host) - 2 );

        $this->department = $this->app->make('department')->findByAttribute('path', $path);

        if(!$this->department){

            $this->department = $this->app->make('department')->findByAttribute('code', 'default');

        }

        /**
         * Match user session to initialize $theme
         */
        $session_token = $this->app->session->get('_token');

        $theme_session = $this->app->make('theme_session')->findByAttribute('session_token', $session_token);

        if(!$theme_session){

            $this->theme = $this->app->make('theme')->findByAttribute('code', 'default');

            $this->app->make('theme_session')->fill([
                'theme_id' => $this->theme->id,
                'session_token' => $session_token,
            ])->save();

        } else {

            $this->theme = $this->app->make('theme')->find($theme_session->theme_id);

            $theme_session->touch();

        }

    }


    /**
     * Bind all registered entities to the application so we can easily
     *  instantiate them with their config anywhere we need them.
     *
     * @return void
     */
    protected function entities()
    {
        // Then we
        // todo bind singleton()s to eavs as {entity}_resource
        // todo add resolving() listener to each entity
        foreach($this->app->config['entity'] as $entity => $config){

            if($config['type'] == \Lavender::ENTITY_TYPE_EAV){

//                $this->app->singleton("{$entity}_resource", function($app, $default) use ($entity, $config){
//
//                    $queryBuilder = new \Lavender\Core\Database\Query\Builder;
//
//                    $model = new \Lavender\Core\Database\Entity\Resource($default);
//
//                    return $model->init("{$entity}_resource", $config);
//
//                });


            }

            $this->app->bind($entity, function($app, $default) use ($entity, $config){

                $model = new $config['type']($default);

                return $model->init($entity, $config);

            });

        }
    }


    /**
     * Merge default entity configs with custom entities
     *
     * @return void
     */
    protected function defaults()
    {
        $this->app->config->afterLoading(null, function($config, $group, $items){

            if($group == 'entity'){

                foreach($items as $id => $entity){

                    $items[$id] = array_merge(
                        $config['defaults']['entity'],
                        $entity
                    );

                }

            }

            return $items;

        });
    }


}