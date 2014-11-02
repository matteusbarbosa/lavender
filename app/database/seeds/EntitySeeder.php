<?php

class EntitySeeder extends Seeder
{

    public function run()
    {
        \Eloquent::unguard();
        $config = \Config::get('entity');
        foreach($config as $identifier => $entity){
            if($entity['defaults']){
                foreach($entity['defaults'] as $default){
                    $model = \App::make($identifier, $default);
                    $model->save();
                }
            }
        }
    }

}