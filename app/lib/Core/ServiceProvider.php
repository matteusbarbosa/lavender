<?php

namespace Lavender\Core;


use Lavender\Core\Database\Query\Builder as Schema;
use Illuminate\Support\ServiceProvider as CoreServiceProvider;

class ServiceProvider extends CoreServiceProvider
{
    /**
     * Domain-level application scope object:
     *  Used to define websites and stores.
     *  Entity attribute data can be unique for each store id.
     *
     * @var \Lavender\Core\Database\Entity $store
     */
    protected $store;

    /**
     * Route-level application scope object:
     *  Belongs to one $store
     *  Used to segment a store's catalog to define alternate
     *   functionality for core features such as search and checkout.
     *  Entity attribute data can be unique for each department id.
     *
     * @var \Lavender\Core\Database\Entity $department
     */
    protected $department;

    /**
     * Session-level application scope object:
     *  Belongs to one $department
     *  Used to describe themes, locales.
     *
     * @var \Lavender\Core\Database\Entity $view
     */
    protected $view;

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

        $this->mergeDefaults();

        $this->loadEntities();

        $this->loadScope();

        $this->loadRoutes();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind('schema', function(){
            return new Schema();
        });
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

    public function setStore($store)
    {
        if(is_string($store)){

            $store = $this->app->make('store')->findByAttribute('code', $store);

        }

        $this->store = $store;
    }


    public function loadRoutes()
    {
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
     * @return \Lavender\Core\Database\Entity
     */
    public function loadScope()
    {
        $hostname = $this->app->request->server->get('SERVER_NAME');

        foreach($this->app->make('store')->all() as $store){

            if($hostname == $store->url){

                $this->store = $store;

            }

        }

        if(!isset($this->store)){

            $this->store = $this->app->make('store')->findByAttribute('code', 'default');

        }
    }


    protected function loadEntities()
    {
        // Then we bind the entities to the application so we can easily
        // instantiate them with their config anywhere we need them.
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
    protected function mergeDefaults()
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