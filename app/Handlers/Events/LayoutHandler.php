<?php
namespace App\Handlers\Events;

use HTML;
use Illuminate\Support\Facades\Auth;

class LayoutHandler
{
    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\Layout\LoadBase',
            'App\Handlers\Events\LayoutHandler@base'
        );
        $events->listen(
            'App\Events\Layout\LoadFrontend',
            'App\Handlers\Events\LayoutHandler@frontend'
        );
        $events->listen(
            'App\Events\Layout\LoadBackend',
            'App\Handlers\Events\LayoutHandler@backend'
        );
    }

    /**
     * Base layout applied to all views
     *
     * @param $event
     */
    public function base($event)
    {
        $this->baseLayouts();
    }

    public function frontend($event)
    {
        $this->topLinks();

        $this->bottomLinks();

        $this->topNavigation();

        $this->frontendLayouts();
    }

    public function backend($event)
    {
        $this->backendLinks();

        $this->backendNavigation();

        $this->backendLayouts();

    }

    protected function baseLayouts()
    {
        $this->composer('page.section.head', function($view){

            append_section('head.anchor', ['config' => 'store.name']);

            append_section('head.style', ['style' => 'css/app.css']);

            append_section('head.script', ['script' => 'js/app.js']);

            append_section('head.meta', ['meta' => ['name' => 'robots', 'content' => 'noindex, nofollow']]);

        });

        $this->composer('page.section.footer', function($view){

            append_section('footer.bottom.before', ['layout' => 'page.section.footer.copyright']);

        });
    }

    protected function frontendLayouts()
    {
        $this->composer('page.section.header', function($view){

            append_section('header.top.links', ['menu' => 'top.links']);

            append_section('header.top.navigation', ['menu' => 'top.navigation']);

        });

        $this->composer('page.section.header.logo', function($view){

            $view->with('url', url('/'));

        });

        $this->composer('page.section.footer', function($view){

            append_section('footer.top.links', ['menu' => 'bottom.links']);

        });
    }

    protected function backendLayouts()
    {
        $this->composer('page.section.head', function($view){

            append_section('head.style', ['style' => 'css/jquery.dataTables.min.css']);

            append_section('head.script', ['script' => 'js/jquery-2.1.3.min.js']);

            append_section('head.script', ['script' => 'js/jquery.dataTables.min.js']);

        });

        $this->composer('page.section.header.logo', function($view){

            $view->with('url', url('backend'));

        });

        $this->composer('page.section.header', function($view){

            append_section('header.top.links', ['menu' => 'backend.links']);

            append_section('header.top.navigation', ['menu' => 'backend.navigation']);

        });
    }

    protected function composer($section, \Closure $callback)
    {
        view()->composer($section, $callback);
    }

    protected function backendNavigation()
    {
        $backend_navigation = menu('backend.navigation');

        $backend_navigation->add('home', [
            'content' => HTML::link('backend','Dashboard'),
        ]);

        $backend_navigation->add('catalog', [
            'content' => HTML::link('backend/catalog','Catalog'),
            'children' => [
                ['content' => HTML::link('backend/product','Products')],
                ['content' => HTML::link('backend/category','Categories')],
            ]
        ]);

        $backend_navigation->add('sales', [
            'content' => HTML::link('backend/sales','Sales'),
            'children' => [
                ['content' => HTML::link('backend/sales/orders','Orders')],
                ['content' => HTML::link('backend/sales/reports','Reports')],
            ]
        ]);

        $backend_navigation->add('account', [
            'content' => HTML::link('backend/account','Accounts'),
            'children' => [
                ['content' => HTML::link('backend/customer','Customers')],
                ['content' => HTML::link('backend/admin','Administrators')],
            ]
        ]);

        $backend_navigation->add('website', [
            'content' => HTML::link('backend/website','Website'),
            'children' => [
                ['content' => HTML::link('backend/store','Stores')],
                ['content' => HTML::link('backend/theme','Themes')],
                [
                    'content' => HTML::link('backend/config', 'Config'),
                    'children' => [
                        ['content' => HTML::link('backend/config/import', 'Import')],
                        ['content' => HTML::link('backend/config/export', 'Export')],
                    ]
                ]
            ]
        ]);
    }

    protected function backendLinks()
    {
        $backend_links = menu('backend.links');

        $backend_links->add('frontend', [
            'content' => HTML::link('/', 'Go to frontend')
        ]);
    }

    protected function bottomLinks()
    {
        $bottom_links = menu('bottom.links');

        $bottom_links->add('contact', [
            'content' => HTML::link('contact', 'Contact us')
        ]);
    }

    protected function topLinks()
    {
        $top_links = menu('top.links');

        $top_links->add('cart', [
            'content' => HTML::link('cart', 'My Cart ('.app('cart')->getSummary().')')
        ]);

        if(Auth::customer()->check()){

            $top_links->add('account', [
                'content' => HTML::link('customer/dashboard', 'My Account')
            ]);

            $top_links->add('logout', [
                'content' => HTML::link('customer/logout', 'Logout')
            ]);

        } else {

            $top_links->add('login', [
                'content' => HTML::link('customer/login', 'Login/Register')
            ]);

        }
    }

    protected function topNavigation()
    {
        $store = app('store');

        $categories = $store->root_category ?
            $store->root_category->children : [];

        foreach($categories as $category){

            menu('top.navigation')->add('cat-'.$category->id, [
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