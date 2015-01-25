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
        $this->app->bindShared('store', function ($app){

            $store = entity('store');

            return new Shared\Store($store);
        });
    }

    private function registerListeners()
    {
        $this->app->events->listen('entity.query.select', function (QueryBuilder $query){

            if($this->app->bound('store') && $this->app->store->exists){

                $config = $query->config();

                if($config['scope'] == Scope::IS_STORE){

                    $query->where('store_id', '=', $this->app->store->id);
                }
            }
        });

        $this->app->events->listen('entity.query.insert', function (QueryBuilder $query, &$values){

            if($this->app->bound('store') && $this->app->store->exists){

                $config = $query->config();

                if($config['scope'] == Scope::IS_STORE){

                    $values['store_id'] = $this->app->store->id;
                }
            }
        });

        $this->app->events->listen('entity.creator.prepare', function (&$config){

            if($config['scope'] == Scope::IS_STORE){

                $scope['store_id'] = ['parent' => 'store'];

                merge_defaults($scope, 'attribute');

                $config['attributes']['store_id'] = $scope;

            }
        });
    }

    private function registerInstaller()
    {
        $this->app->installer->update('add_default_store', function ($console){

            // If a default store doesnt exist, create it now
            if(!$this->app->store->exists){

                $console->call('lavender:store', ['--default' => true]);

                $this->bootCurrentStore();
            }
        }, 20);
    }

    private function registerConfig()
    {
        $this->app['lavender.config']->merge(['store']);
    }

    private function registerCommands()
    {
        $this->app->bind('lavender.store', function (){
            return new Commands\CreateStore;
        });
    }

    public function bootCurrentStore()
    {
        try{

            if($this->app->store->bootStore()){
                // merge store config into global config
                foreach($this->app->store->config->all() as $item){

                    $this->app['config']->set('store.' . $item->key, $item->value);

                }
            }

        } catch(QueryException $e){

            // missing core tables
            if(!\App::runningInConsole()) throw new \Exception("Lavender not installed.");
        } catch(\Exception $e){

            // something went wrong
            if(!\App::runningInConsole()) throw new \Exception($e->getMessage());
        }
    }
}

