<?php
namespace App\Providers;

use App\Cart;
use App\Store;
use App\Theme;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Blade;
use Lavender\Support\ServiceProvider;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AppServiceProvider extends ServiceProvider
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
        return ['store', 'theme', 'cart'];
    }


    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootStore();

        $this->bootTheme();
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerStore();

        $this->registerTheme();

        $this->registerCart();

        $this->app->booted(function(){

            $this->registerBladeExtensions();

        });
    }

    private function registerCart()
    {
        $this->app->singleton('cart', function($app){

            return new Cart();
        });
    }

    private function registerStore()
    {
        $this->app->singleton('store', function ($app){

            $store = null;//entity('store');

            return new Store($store);
        });
    }

    private function registerTheme()
    {
        $this->app->singleton('theme', function ($app){

            $theme = entity('theme');

            return new Theme($theme);
        });
    }

    public function bootStore()
    {
        try{

            if($this->app->store->bootStore()){
                // merge store config into global config
//                foreach($this->app->store->config->all() as $item){
//
//                    $this->app['config']->set('store.' . $item->key, $item->value);
//
//                }
            } else {

                throw new \Exception("Default store was not found.");

            }

        } catch(QueryException $e){

            // missing core tables
            if(!\App::runningInConsole()) throw new HttpException(500, "Lavender not installed.");
        } catch(\Exception $e){

            // something went wrong
            if(!\App::runningInConsole()) throw new HttpException(500, $e->getMessage());
        }
    }

    /**
     * Match user session to initialize $theme
     *
     * @throws HttpException
     */
    private function bootTheme()
    {
        try{

            if($this->app->theme->bootTheme($this->app->store)){

                // Add file paths for current theme.
                $this->registerViewPaths();

            } else {

                throw new \Exception("Theme not set for current store.");

            }

        } catch(QueryException $e){

            // missing core tables
            if(!\App::runningInConsole()) throw new HttpException(500, "Lavender not installed.");
        } catch(\Exception $e){

            // something went wrong
            if(!\App::runningInConsole()) throw new HttpException(500, $e->getTraceAsString());
        }
    }


    /**
     * Update the view paths.
     *
     * @return void
     */
    private function registerViewPaths()
    {
        // get current view paths
        $paths = $this->app->config['view.paths'];

        // unset original paths
        $this->app['config']->set('view.paths', []);

        // merge all package views
        // todo keep?
//        $viewFinder = $this->app['view.finder'];
//        foreach($viewFinder->getHints() as $module_paths){
//
//            $paths = array_merge($paths, $module_paths);
//        }

        // create new paths based on current theme
        foreach($this->app->theme->fallbacks as $fallback){

            foreach($paths as $path){

                $this->app['config']->push('view.paths', $path . '/' . $fallback);

            }
        }

    }

    private function registerBladeExtensions()
    {
        Blade::extend(function($view, $compiler){
            return preg_replace(
                $compiler->createMatcher('tabs'),
                '$1<?php echo Tabs::make$2; ?>',
                $view
            );
        });

        Blade::extend(function($html, $compiler){
            return preg_replace(
                $compiler->createMatcher('menu'),
                '$1<?php echo Menu::make$2; ?>',
                $html
            );
        });

        Blade::extend(function($html){
            return preg_replace(
                '/\@define(.+)/',
                '<?php ${1}; ?>',
                $html
            );
        });

        Blade::extend(function($html, $compiler){
            return preg_replace(
                $compiler->createMatcher('workflow'),
                '$1<?php echo Workflow::make$2; ?>',
                $html
            );
        });

        Blade::extend(function($html, $compiler){
            return preg_replace(
                $compiler->createMatcher('paginate'),
                '$1<?php echo paginate$2; ?>',
                $html
            );
        });

        Blade::extend(function($html, $compiler){
            return preg_replace(
                $compiler->createMatcher('printArray'),
                '$1<?php printArray$2; ?>',
                $html
            );
        });
    }


}