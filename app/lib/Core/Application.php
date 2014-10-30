<?php
namespace Lavender\Core;
use Illuminate\Foundation\Application as CoreApplication;

class Application extends CoreApplication
{

    /**
     * @return mixed
     */
    public function loadStore()
    {
        $hostname = $this->request->server->get('SERVER_NAME');

        foreach(Lavender::entity('store')->all() as $store){

            if($hostname == $store->url){

                Lavender::setStore($store);

                return $store;

            }

        }

        Lavender::setStore('default');

        return Lavender::getStore();
    }

    /**
     * @param $store
     */
    public function loadEntities($store)
    {
        foreach(\Lavender::allEntityConfig() as $entity => $config){

            \App::bind($entity, function($app, $default) use ($entity){

                $config = array_merge(
                    \Config::get("defaults.entity"),
                    \Config::get("entity.{$entity}")
                );

                $model = new $config['type']($default);

                return $model->init($entity, $config);

            });

        }
    }
}