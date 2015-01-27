<?php
namespace Lavender\Catalog;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\HTML;
use Lavender\Support\Facades\Menu;

class CatalogServiceProvider extends ServiceProvider
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
        return array();
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('lavender/catalog', 'catalog', realpath(__DIR__));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerInstaller();

        $this->app->booted(function (){

            $this->registerRoutes();

            $this->registerMenu();
        });
    }

    private function registerInstaller()
    {
        $this->app->installer->update('Install root category', function ($console){

            // If a root category doesn't exist, create it now
            if(!$this->app->store->root_category){

                $console->call('lavender:category', ['--store' => $this->app->store->id]);

                // Reload the new store object
                $this->app->store = entity('store')->find($this->app->store->id);
            }
        }, 40);
    }

    //todo improve routes
    private function registerRoutes()
    {
        // Product view pages
        \Route::get(\Config::get('store.product_url') . '/{product_url}', function ($product_url){

            $product = entity('product')->findByAttribute('url', $product_url);

            return $this->app->view->make('catalog.product.view')
                ->withProduct($product);
        });

        // Category view pages
        \Route::get(\Config::get('store.category_url') . '/{category_url}', function ($category_url){

            $category = entity('category')->findByAttribute('url', $category_url);

            return $this->app->view->make('catalog.category.view')
                ->withCategory($category)
                ->withProducts($category->products()->paginate(\Config::get('store.product_count')));
        });
    }

    private function registerMenu()
    {
        $store = $this->app->store;

        $categories = $store->root_category ?
            $store->root_category->children : [];

        foreach($categories as $category){

            Menu::make('frontend')->add('cat-'.$category->id, [
                'content' => HTML::link($category->getUrl(), $category->name),
                'children' =>  $this->getChildCategories($category)
            ]);

        }

    }

    protected function getChildCategories($category)
    {
        $children = [];

        foreach($category->children as $child){

            $children[] = [
                'content' => HTML::link($child->getUrl(), $child->name),
                'children' => $this->getChildCategories($child)
            ];

        }

        return $children;
    }
}