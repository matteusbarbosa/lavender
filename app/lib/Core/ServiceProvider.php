<?php
namespace Lavender\Core;

use Illuminate\View\ViewServiceProvider;
use Illuminate\View\FileViewFinder;

class ServiceProvider extends ViewServiceProvider
{
    /**
     * Domain-level scope object:
     *  Used to define websites and stores.
     *
     * @var \Lavender\Core\Database\Entity $store
     * @internal has values: id, code, name, url, default_department
     * @internal attribute data can be unique for each store id.
     */
    protected $store;

    /**
     * Subdomain-level scope object:
     *  Used to segment a store's catalog and define alternate
     *   functionality for core features such as search and checkout.
     *
     * @var \Lavender\Core\Database\Entity $department
     * @internal has parent $store
     * @internal has values id, code, name, store_id, path, default_theme
     * @internal attribute data can be unique for each department id.
     */
    protected $department;

    /**
     * Session-level scope object:
     *  Used to describe themes, locales.
     *
     * @var \Lavender\Core\Database\Entity $theme
     * @internal has parent $department
     * @internal has values id, code, name, department_id, parent_theme.
     */
    protected $theme;


    protected $theme_fallbacks;

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        //$this->package('lavender/core');

        // First we want to merge default entity configs with
        // custom entity data configured per each module.
        $this->defaults();

        // todo modules/migrations - need to figure out when to include a module's entity data

        // todo register event listeners

        // Next let's bind these entities to the application
        // so we can easily create them later.
        $this->entities();

        // CLI requests do not need scope or themes loaded.
        if(!$this->app->runningInConsole()){

            // Now we perform some checks here to determine which $store,
            // $department, and $view to prioritize in our Builder.
            $this->scope();


            $this->theme_fallbacks = $this->themes($this->theme->id);

            // Overriding the default view finder logic to support our
            // theme fallbacks.
            $this->registerViewFinder();

            // Let's register our view composers
            $this->composers();

            // Finally, we can now load the routes and filters assigned to the
            // scope, let's build them now so the app can finish booting.
            $this->routes();


        } else {

            parent::registerViewFinder();

        }
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerEngineResolver();

        // Once the other components have been registered we're ready to include the
        // view environment and session binder. The session binder will bind onto
        // the "before" application event and add errors into shared view data.
        $this->registerFactory();

        $this->registerSessionBinder();
    }


    /**
     * Register the view finder implementation.
     *
     * @return void
     */
    public function registerViewFinder()
    {
        $fallbacks = $this->theme_fallbacks;

        $this->app->bindShared('view.finder', function($app) use ($fallbacks){

            $theme_paths = [];

            $paths = $app['config']['view.paths'];

            foreach($fallbacks as $fallback){

                foreach($paths as $path){

                    $theme_paths[] = $path.'/'.$fallback;

                }

            }

            return new FileViewFinder($app['files'], $theme_paths);
        });
    }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }


    protected function composers()
    {
        foreach($this->mergeThemeDefaults('composers') as $layout => $composer){

            $this->app->view->composer($layout, $composer);

        }
    }

    /**
     * Define a theme's routes and route filters.
     *
     * @return void
     */
    protected function routes()
    {
        foreach($this->mergeThemeDefaults('routes') as $path => $route){

            // todo filters

            $route = $this->merge(
                $this->app->config['defaults.controller_action'],
                $route
            );

            if($layout = $route['layout']){

                $this->route($route['method'], $path, function() use ($layout){

                    return \View::make($layout);

                });

            } elseif($route['controller'] && $route['action']){

                $this->route($route['method'], $path, array(
                    'uses' => sprintf("%s@%s", $route['controller'], $route['action']),
                ));

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

        } else {

            \Route::get($path, $callback);

        }
    }


    /**
     * Merge inherited theme routes
     * @param int $theme_id
     * @return array
     */
    protected function themes($theme_id)
    {
        $themes = [];

        if($theme = $this->app->make('theme')->find($theme_id)){

            $themes[] = $theme->code;

            if($theme->parent_theme){

                $themes = array_merge(
                    $themes,
                    $this->themes($theme->parent_theme)
                );

            }

        }

        return $themes;
    }


    /**
     * @param $config_type
     * @return array
     */
    protected function mergeThemeDefaults($config_type)
    {
        $merged = [];

        foreach($this->theme_fallbacks as $theme_code){

            if(isset($this->app->config[$config_type][$theme_code])){

                $merged = $this->merge(
                    $this->app->config[$config_type][$theme_code],
                    $merged
                );

            }
        }

        return $merged;
    }


    /**
     * Describe the scope for this request
     *
     * @return void
     */
    protected function scope()
    {
        /**
         * Match the request url to store domain to initialize $store
         */
        if(!$this->store = $this->app->make('store')
            ->findByAttribute('url', $this->app->request->domain())){

            // No store found, set default
            $this->store = $this->app->make('store')
                ->findByAttribute('code', 'default');

        }

        /**
         * Match the requested sub-domain to initialize $department
         */
        if(!$this->department = $this->app->make('department')
            ->findByAttribute('subdomain', $this->app->request->subdomain())){

            // No department found, set default
            $this->department = $this->app->make('department')
                ->findByAttribute('code', $this->store->default_department);

        }

        /**
         * Match user session to initialize $theme
         */
        $session_token = $this->app->session->get('_token');

        if($theme_session = $this->app->make('theme_session')
            ->findByAttribute('session_token', $session_token)){

            $this->theme = $this->app->make('theme')
                ->find($theme_session->theme_id);

            $theme_session->touch();

        } else {

            // No theme found, set default
            $this->theme = $this->app->make('theme')
                ->findByAttribute('code', $this->department->default_theme);

            // No theme_session found, make new and assign to default theme
            $this->app->make('theme_session')->fill([
                'theme_id' => $this->theme->id,
                'session_token' => $session_token,
            ])->save();

        }

    }


    /**
     * Bind all registered entities to the application so we can easily
     *  instantiate them with their config anywhere we need them.
     *
     * @return void
     */
    protected function entities()
    {
        // Then we
        // todo bind singleton()s to eavs as {entity}_resource
        // todo add resolving() listener to each entity
        foreach($this->app->config['entity'] as $entity => $config){

            if($config['type'] == \Lavender::ENTITY_TYPE_EAV){

//                $this->app->singleton("{$entity}_resource", function($app, $default) use ($entity, $config){
//
//                    $queryBuilder = new \Lavender\Core\Database\Query\Builder;
//
//                    $model = new \Lavender\Core\Database\Entity\Resource($default);
//
//                    return $model->init("{$entity}_resource", $config);
//
//                });


            }

            $this->app->bind($entity, function($app, $default) use ($entity, $config){

                $model = new $config['type']($default);

                return $model->init($entity, $config);

            });

        }
    }


    /**
     * Merge default entity configs with custom entities
     *
     * @return void
     */
    protected function defaults()
    {
        $this->app->config->afterLoading(null, function($config, $group, $items){

            if($group == 'entity'){

                foreach($items as $id => $entity){

                    $items[$id] = array_merge(
                        $config['defaults']['entity'],
                        $entity
                    );

                }
            }

            return $items;

        });
    }


    /**
     * Array merge recursive
     * @param array $arr1
     * @param array $arr2
     * @return array
     */
    protected function merge($arr1, $arr2)
    {
        if(!is_array($arr1) || !is_array($arr2)){return $arr2;}

        foreach($arr2 as $key => $val){

            $arr1[$key] = $this->merge(@$arr1[$key], $val);

        }

        return $arr1;
    }





}