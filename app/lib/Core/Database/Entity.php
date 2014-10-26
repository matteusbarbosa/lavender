<?php
namespace Lavender\Core\Database;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Config;

class Entity extends Eloquent
{
    public static $identifier;
    protected $config;

    /**
     * Create a new Eloquent model instance.
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct($identifier = null, array $attributes = array())
    {
        if($identifier){
            $this->config($identifier);
        }
        parent::__construct($attributes);
    }

    public function getconfig()
    {
        return $this->config;
    }

    /**
     * Configure the entity
     *
     * @return void
     */
    protected function config($identifier)
    {
        self::$identifier = $identifier;
        $this->config = array_merge(
            Config::get('defaults.entity'),
            Config::get('entity.'.$identifier)
        );
        $this->table = $this->config['table'];
        $this->timestamps = $this->config['timestamps'];
        $this->fillable = array_keys($this->config['attributes']);
    }


    public function collection()
    {
        return self::all();
    }





    public function findByAttribute($attribute, $value, $columns = array('*'))
    {
        return $this->where($attribute, '=', $value)->first($columns);
    }


    /**
     * Find a model by its primary key.
     *
     * @param  mixed  $id
     * @param  array  $columns
     * @return \Illuminate\Support\Collection|static
     */
    public static function find($id, $columns = array('*'))
    {
        if (is_array($id) && empty($id)) return new Collection;

        $instance = new static;

        $instance->config(self::$identifier);

        return $instance->newQuery()->find($id, $columns);
    }

    /**
     * Get all of the models from the database.
     *
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function all($columns = array('*'))
    {
        $instance = new static;

        $instance->config(self::$identifier);

        return $instance->newQuery()->get($columns);
    }



}