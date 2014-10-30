<?php
namespace Lavender\Core\Database\Entity\Type;
use Lavender\Core\Database\Entity;

class Eav extends Entity
{


    public function collection()
    {
        if(!isset($this->collection)){
            $join = $this;
            $select = array("{$this->table}.*");
            $eav = \Config::get('defaults.eav');
            foreach($eav as $type){
                $select[] = "{$this->table}.value as (select)";
                $join = $join->leftJoin(
                    "{$this->table}_attribute_{$type} as {$type}",
                    "{$this->table}.id", '=', "{$type}.entity_id"
                );
            }
            // todo associate attribute keys w/ values
            // todo refactor "code" to be "key" because...
            // todo ... fucking "code" doesnt make sense.
            $this->collection = $join;
                //none of this does anything
//                $joins = array();
//                foreach($this->config['attributes'] as $code => $attribute){
//                    $joins[$attribute['type']][] = $code;
//                }
//                $select = array("{$this->table}.*");
//                foreach($joins as $type => $attrs){
//                    foreach($attrs as $attr){
//                        $select[] = "{$type}.value as $attr";
//                    }
//                    $this->join(
//                        "{$this->table}_attribute_{$type} as {$type}",
//                        "{$this->table}.id", '=', "{$type}.entity_id"
//                    );
//                }
//                $this->select($select);




        }
        return $this->collection;
    }

}