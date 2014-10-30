<?php
namespace Lavender\Core\Database;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Config;
use Lavender\Core\Database\Query\Builder as QueryBuilder;

class Entity extends Eloquent
{
    /**
     * Unique model name
     *
     * @var string $identifier
     */
    protected static $identifier;

    /**
     * Entity configuration
     *
     * @var array $config
     */
    protected $config;


    /**
     * Configure the entity
     *
     * @param string $entity
     * @param array $config
     * @return $this
     */
    public function init($entity, $config)
    {
        self::$identifier = $entity;

        $this->config = $config;

        $this->table = $this->config['table'];

        $this->timestamps = $this->config['timestamps'];

        $this->fillable = array_keys($this->config['attributes']);

        return $this;
    }

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  \Lavender\Core\Database\Query\Builder $query
     * @return \Lavender\Core\Database\Entity\Builder|static
     */
    public function newEloquentBuilder($query)
    {
        return new Entity\Builder($query);
    }


    /**
     * Get a new query builder instance for the connection.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    protected function newBaseQueryBuilder()
    {
        $conn = $this->getConnection();

        $grammar = $conn->getQueryGrammar();

        return new QueryBuilder($conn, $grammar, $conn->getPostProcessor());
    }


    /**
     * Create a new instance of the given model.
     *
     * @param  array  $attributes
     * @param  bool   $exists
     * @return static
     */
    public function newInstance($attributes = array(), $exists = false)
    {
        // This method just provides a convenient way for us to generate fresh model
        // instances of this current model. It is particularly useful during the
        // hydration of new objects via the Entity query builder instances.
        $model = \Lavender::entity(self::$identifier, $attributes);

        $model->exists = $exists;

        return $model;
    }

    /**
     * Begin querying the model.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function query()
    {
        $instance = Lavender::entity(self::$identifier);

        return $instance->newQuery();
    }


    /**
     * Get all of the models from the database.
     *
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function all($columns = array('*'))
    {
        $instance = \Lavender::entity(self::$identifier);

        return $instance->newQuery()->get($columns);
    }


//
//    /**
//     * Begin querying the model on a given connection.
//     *
//     * @param  string  $connection
//     * @return \Illuminate\Database\Eloquent\Builder
//     */
//    public static function on($connection = null)
//    {
//        // First we will just create a fresh instance of this model, and then we can
//        // set the connection on the model so that it is be used for the queries
//        // we execute, as well as being set on each relationship we retrieve.
//        $instance = new static;
//
//        $instance->setConnection($connection);
//
//        $instance->config(self::$identifier);
//
//        return $instance->newQuery();
//    }
//
//    /**
//     * Find a model by its primary key.
//     *
//     * @param  mixed  $id
//     * @param  array  $columns
//     * @return \Illuminate\Support\Collection|static
//     */
//    public static function find($id, $columns = array('*'))
//    {
//        if (is_array($id) && empty($id)) return new Collection;
//
//        $instance = new static;
//
//        $instance->config(self::$identifier);
//
//        return $instance->newQuery()->find($id, $columns);
//    }
//
//    /**
//     * Find a model by its primary key or return new static.
//     *
//     * @param  mixed  $id
//     * @param  array  $columns
//     * @return \Illuminate\Support\Collection|static
//     */
//    public static function findOrNew($id, $columns = array('*'))
//    {
//        if ( ! is_null($model = static::find($id, $columns))) return $model;
//
//        $instance = new static;
//
//        $instance->config(self::$identifier);
//
//        return $instance;
//    }
//
//    /**
//     * Being querying a model with eager loading.
//     *
//     * @param  array|string  $relations
//     * @return \Illuminate\Database\Eloquent\Builder|static
//     */
//    public static function with($relations)
//    {
//        if (is_string($relations)) $relations = func_get_args();
//
//        $instance = new static;
//
//        $instance->config(self::$identifier);
//
//        return $instance->newQuery()->with($relations);
//    }
//
//    /**
//     * Destroy the models for the given IDs.
//     *
//     * @param  array|int  $ids
//     * @return int
//     */
//    public static function destroy($ids)
//    {
//        // We'll initialize a count here so we will return the total number of deletes
//        // for the operation. The developers can then check this number as a boolean
//        // type value or get this total count of records deleted for logging, etc.
//        $count = 0;
//
//        $ids = is_array($ids) ? $ids : func_get_args();
//
//        $instance = new static;
//
//        $instance->config(self::$identifier);
//
//        // We will actually pull the models from the database table and call delete on
//        // each of them individually so that their events get fired properly with a
//        // correct set of attributes in case the developers wants to check these.
//        $key = $instance->getKeyName();
//
//        foreach ($instance->whereIn($key, $ids)->get() as $model)
//        {
//            if ($model->delete()) $count++;
//        }
//
//        return $count;
//    }
//
//    /**
//     * Clone the model into a new, non-existing instance.
//     *
//     * @param  array  $except
//     * @return \Illuminate\Database\Eloquent\Model
//     */
//    public function replicate(array $except = null)
//    {
//        $except = $except ?: [
//            $this->getKeyName(),
//            $this->getCreatedAtColumn(),
//            $this->getUpdatedAtColumn(),
//        ];
//
//        $attributes = array_except($this->attributes, $except);
//
//        with($instance = new static)->setRawAttributes($attributes);
//
//        $instance->config(self::$identifier);
//
//        return $instance->setRelations($this->relations);
//    }



}