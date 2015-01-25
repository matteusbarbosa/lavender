<?php
namespace Lavender\Theme;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\QueryException;

class ThemeServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    protected $theme_config = ['composers', 'layout', 'routes', 'filters'];
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['theme', 'theme.creator'];
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('lavender/view', 'theme', realpath(__DIR__));

        $this->commands(['theme.creator']);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerTheme();

        $this->registerInstaller();

        $this->registerCommands();

        $this->registerConfig();

        $this->app->booted(function (){

            if($this->app->store->exists){

                $this->bootCurrentTheme();

            }

        });
    }

    private function registerTheme()
    {
        $this->app->bindShared('theme', function ($app){

            $theme = entity('theme');

            return new Shared\Theme($theme);

        });
    }

    /**
     * Register artisan commands
     */
    private function registerCommands()
    {
        $this->app->bind('theme.creator', function (){
            return new Commands\CreateTheme;
        });
    }

    /**
     * Register view configs
     */
    private function registerConfig()
    {
        $this->app['lavender.config']->merge($this->theme_config);

        $merge_routes = [
            'config' => 'routes',
            'default' => 'routes',
            'depth' => 2
        ];

        $merge_layout = [
            'config' => 'layout',
            'default' => 'layout',
            'depth' => 4
        ];

        $this->app['lavender.config.defaults']->merge([$merge_routes, $merge_layout]);
    }

    /**
     * Register view installer
     */
    private function registerInstaller()
    {
        $this->app->installer->update('add_default_theme', function ($console){

            // If a default theme doesnt exist, create it now
            if(!$this->app->theme->exists){

                $console->call('lavender:theme', ['--store' => $this->app->store->id]);

                //todo do i really want to do this?
                $this->bootCurrentTheme();
            }
        }, 30);
    }

    /**
     * Match user session to initialize $theme
     *
     * @throws \Exception
     * @return void
     */
    private function bootCurrentTheme()
    {
        try{

            if($this->app->theme->bootTheme($this->app->store)){
                // note: we boot the theme's callbacks prior to registering
                // the layouts, composers, routes, and filters.
                $this->mergeConfig();

                // Override Laravel's view.finder to support theme fallbacks.
                $this->registerViewFinder();

                // Now let's register our view composers
                $this->registerComposers();

                // Inject views into our layouts
                $this->injectLayoutViews();

                // Register filters that are used for routes
                $this->registerFilters();

                // Finally we can load our routes and filters so the app can finish booting.
                $this->registerRoutes();
            }

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
        // Cascade various configuration types based on current theme fallbacks.
        foreach($this->theme_config as $type){

            $merged = [];

            $config = $this->app->config[$type];

            foreach($this->app->theme->fallbacks as $theme_code){

                if(isset($config[$theme_code])){

                    $merged = recursive_merge($config[$theme_code], $merged);
                }
            }

            $this->app->config[$type] = $merged;
        }
    }

    /**
     * Register the view finder implementation.
     *
     * @return void
     */
    private function registerViewFinder()
    {
        $viewFinder = $this->app->make('view.finder');

        $paths = $this->app->config['view.paths'];

        $hints = $viewFinder->getHints();

        foreach($hints as $module_paths){

            $paths = array_merge($paths, $module_paths);
        }

        foreach($this->app->theme->fallbacks as $fallback){

            foreach($paths as $path){

                $viewFinder->addLocation($path . '/' . $fallback);
            }
        }
    }

    /**
     * Register all composers
     *
     * @return void
     */
    private function registerComposers()
    {
        foreach($this->app->config['composers'] as $layout => $composer){

            $this->app->view->composer($layout, $composer);
        }
    }

    /**
     * Injects layout views.
     */
    private function injectLayoutViews()
    {
        foreach($this->app->config['layout'] as $viewName => $sections){

            $this->app->view->composer($viewName, function ($view) use ($sections){

                $this->app['layout.injector']->inject($sections);
            });
        }
    }

    /**
     * Define a theme's routes and route filters.
     *
     * @return void
     */
    private function registerFilters()
    {
        foreach($this->app->config['filters'] as $filter => $callback){

            \Route::filter($filter, $callback);
        }
    }

    /**
     * Define a theme's routes and route filters.
     *
     * @return void
     */
    private function registerRoutes()
    {
        foreach($this->app->config['routes'] as $path => $route){

            if($route['layout']){

                $this->route($route['method'], $path, ['before' => $route['before'], function () use ($route){

                    return $this->app->view->make($route['layout']);
                }]);
            } elseif($route['controller'] && $route['action']){

                $action = sprintf("%s@%s", $route['controller'], $route['action']);

                $this->route($route['method'], $path, ['before' => $route['before'], 'uses' => $action]);
            }
        }
    }



    /**
     * Register Route
     *
     * @param string $method get|post
     * @param string $path uri segment
     * @param mixed $callback array|Closure
     * @return void
     */
    protected function route($method, $path, $callback)
    {
        if($method == 'post'){

            \Route::post($path, $callback);
        } else{

            \Route::get($path, $callback);
        }
    }
}

