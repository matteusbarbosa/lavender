<?php
namespace Lavender\Store;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\QueryException;
use Lavender\Entity\Database\QueryBuilder;
use Lavender\Support\Facades\Scope;

class StoreServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['store'];
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('lavender/store', 'store', realpath(__DIR__));

        $this->commands(['lavender.store']);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerStore();

        $this->registerCommands();

        $this->registerConfig();

        $this->registerInstaller();

        $this->registerListeners();

        $this->app->booted(function (){

            $this->bootCurrentStore();

        });
    }

    private function registerStore()
    {
        $this->app->bindShared('store.singleton', function ($app){
            return entity('store');
        });
        $this->app->bind('store', function ($app){

            if(!$app['store.singleton']) throw new \Exception("Store model is not instantiated.");

            return clone $app['store.singleton'];
        });
    }
    protected function registerListeners()
    {

        $this->app->events->listen('entity.query.select', function (QueryBuilder $query){

            $config = $query->config();

            if($config['scope'] == Scope::IS_STORE){

                $query->where('store_id', '=', $this->app->store->id);
            } /*elseif($config['scope'] == Scope::IS_DEPARTMENT){

                $query->where('store_id', '=', app('current.store')->id);

                $query->where('department_id', '=', app('current.department')->id);
            }*/
        });

        $this->app->events->listen('entity.query.insert', function (QueryBuilder $query, &$values){

            $config = $query->config();

            if($config['scope'] == Scope::IS_STORE){

                $values['store_id'] = $this->app->store->id;
            } /*elseif($config['scope'] == Scope::IS_DEPARTMENT){

                $values['store_id'] = $this->app->store->id;

                $values['department_id'] = app('current.department')->id;
            }*/
        });

        $this->app->events->listen('entity.creator.prepare', function (&$config){

            if($config['scope'] == Scope::IS_STORE){

                $scope = ['store_id' => ['parent' => 'store']];

                merge_defaults($scope, 'attribute');

                $config['attributes'] += $scope;
            }/* elseif($config['scope'] == Scope::IS_DEPARTMENT){

                $scope = [
                    'store_id' => ['parent' => 'store'],
                    'department_id' => ['parent' => 'department'],
                ];

                merge_defaults($scope, 'attribute');

                $config['attributes'] += $scope;
            }*/
        });
    }

    protected function registerInstaller()
    {
        $this->app->installer->update('Install default store', function ($console){

            // If a default store doesnt exist, create it now
            if(!$this->app->store->id){

                $console->call('lavender:store', ['--default' => true]);

                $this->bootCurrentStore();
            }
        });
    }

    protected function registerConfig()
    {
        $this->app['lavender.config']->merge(['store']);
    }

    protected function registerCommands()
    {
        $this->app->bind('lavender.store', function (){
            return new Commands\CreateStore;
        });
    }

    public function bootCurrentStore()
    {
        try{
            // Find the current store
            $store = $this->app->store->find('rules');

            $this->app['store.singleton'] = $store;

            $this->mergeConfig();

        } catch(QueryException $e){

            // missing core tables
            if(!\App::runningInConsole()) throw new \Exception("Lavender not installed.");
        } catch(\Exception $e){

            // something went wrong
            if(!\App::runningInConsole()) throw new \Exception($e->getMessage());
        }
    }

    public function mergeConfig()
    {
        $config = $this->app->store->config->all();

        foreach($config as $item){

            $this->app['config']->set('store.'.$item->key, $item->value);

        }
    }
}

