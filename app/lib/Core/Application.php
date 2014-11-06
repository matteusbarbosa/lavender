<?php
namespace Lavender\Core;

use Illuminate\Foundation\Application as CoreApplication;

class Application extends CoreApplication
{

    //todo move scope to multisite module
    public function getScope($level)
    {
        if(!$this->config['app.multisite']){

            $level = \Lavender::ENTITY_SCOPE_GLOBAL;

        }

        if(!isset($this->scope[$level])){

            switch($level){

                case \Lavender::ENTITY_SCOPE_DEPARTMENT:
                    $this->scope[$level] = [
                        "%s" =>     "%s.store_id = {$this->store->id} and %s.department_id = {$this->department->id}",
                        "s_%s" =>   "%s.store_id = {$this->store->id} and %s.department_id is null",
                        "d_%s" =>   "%s.store_id is null              and %s.department_id is null",
                    ];
                    break;

                case \Lavender::ENTITY_SCOPE_STORE:
                    $this->scope[$level] = [
                        "%s" =>     "%s.store_id = {$this->store->id}",
                        "s_%s" =>   "%s.store_id = {$this->store->id}",
                        "d_%s" =>   "%s.store_id is null",
                    ];
                    break;

                default :
                    $this->scope[$level] = [""];
                    break;

            }

        }

        return $this->scope[$level];
    }


}