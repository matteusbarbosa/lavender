<?php
namespace Lavender\Page;

use Illuminate\Support\Facades\HTML;
use Illuminate\Support\ServiceProvider;
use Lavender\Support\Facades\Menu;

class PageServiceProvider extends ServiceProvider
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
        return [];
    }


    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('lavender/page', 'page', realpath(__DIR__));
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->booted(function(){

            $this->addCatalog();

        });
    }


    protected function getCategories()
    {
        if(!$root_category = $this->app->store->root_category) return [];

        return $root_category->children;
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

    protected function addCatalog()
    {
        foreach($this->getCategories() as $category){

            Menu::make('frontend')->add('cat-'.$category->id, [
                'content' => HTML::link($category->getUrl(), $category->name),
                'children' =>  $this->getChildCategories($category)
            ]);

        }
    }

}

