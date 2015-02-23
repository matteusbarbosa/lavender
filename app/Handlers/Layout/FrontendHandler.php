<?php
namespace App\Handlers\Layout;

use Illuminate\Support\Facades\Auth;

class FrontendHandler
{
    /**
     * Base layout applied to all views
     *
     * @param $event
     */
    public function handle($event)
    {
        $this->topLinks();

        $this->bottomLinks();

        $this->topNavigation();

        $this->frontendLayouts();
    }

    protected function bottomLinks()
    {
        $bottom_links = menu('bottom.links');

        $bottom_links->add('contact', [
            'href' => url('contact'),
            'text' => 'Contact us',
        ]);
    }

    protected function topLinks()
    {
        $top_links = menu('top.links');

        $top_links->add('cart', [
            'href' => url('cart'),
            'text' => 'My Cart ('.app('cart')->getSummary().')',
        ]);

        if(Auth::customer()->check()){

            $top_links->add('account', [
                'href' => url('customer/dashboard'),
                'text' => 'My Account',
            ]);

            $top_links->add('logout', [
                'href' => url('customer/logout'),
                'text' => 'Logout',
            ]);

        } else {

            $top_links->add('login', [
                'href' => url('customer/login'),
                'text' => 'Login/Register',
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
                'href' => $category->getUrl(),
                'text' => $category->name,
                'children' =>  $this->getChildCategories($category)
            ]);

        }

    }

    protected function getChildCategories($category)
    {
        $children = [];

        foreach($category->children as $child){

            $children[] = [
                'href' => $child->getUrl(),
                'text' => $child->name,
                'children' => $this->getChildCategories($child)
            ];

        }

        return $children;
    }

    protected function frontendLayouts()
    {
        view()->composer('page.section.header', function($view){

            append_section('header.top.links', ['menu' => 'top.links']);

            append_section('header.top.navigation', ['menu' => 'top.navigation']);

        });

        view()->composer('page.section.header.logo', function($view){

            $view->with('url', url('/'));

        });

        view()->composer('page.section.footer', function($view){

            append_section('footer.top.links', ['menu' => 'bottom.links']);

        });
    }
}