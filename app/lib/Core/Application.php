<?php
namespace Lavender\Core;

use Illuminate\Foundation\Application as CoreApplication;
use Lavender\Core\Config\Repository as Config;

class Application extends CoreApplication
{
    protected $store;
    protected $department;
    protected $view;


    public function loadEntities()
    {
        // First we merge default entity configs with our custom entities
        // and return the results.
        $this->config->afterLoading(null, function($config, $group, $items){

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

        // Then we bind the entities to the application so we can easily
        // instantiate them with their config anywhere we need them.
        foreach($this->config['entity'] as $entity => $config){

            self::bind($entity, function($app, $default) use ($entity, $config){

                $model = new $config['type']($default);

                return $model->init($entity, $config);

            });

        }
    }


    public function setStore($store)
    {
        if(is_string($store)){

            $store = self::make('store')->findByAttribute('code', $store);

        }

        $this->store = $store;
    }


    /**
     * @return \Lavender\Core\Database\Entity
     */
    public function loadScope()
    {
        $hostname = $this->request->server->get('SERVER_NAME');

        foreach(self::make('store')->all() as $store){

            if($hostname == $store->url){

                $this->store = $store;

            }

        }

        if(!isset($this->store)){

            $this->store = self::make('store')->findByAttribute('code', 'default');

        }
    }


    public function loadRoutes()
    {
        foreach($this->config['routes'][$this->store->code] as $key => $values){

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

}