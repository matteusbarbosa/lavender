<?php
namespace Lavender\Frontend\Header;

use Illuminate\Support\Facades\HTML;
use Lavender\Support\Facades\Menu;

class MenuComposer
{

    public function compose($view)
    {
        $this->createNav();

        $view->with('navigation', Menu::frontend()->all());
    }


    protected function createNav()
    {
        $this->addCatalog();
    }


    protected function getCategories()
    {
        if(!$root_category = app('store')->root_category) return [];

        return $root_category->children;
    }

    protected function getChildCategories($category)
    {
        $children = [];

        foreach($category->children as $child){

            $children[] = [
                'content' => HTML::link($child->url, $child->name),
                'children' => $this->getChildCategories($child)
            ];

        }

        return $children;
    }

    protected function addCatalog()
    {
        foreach($this->getCategories() as $category){

            Menu::frontend()->add('cat-'.$category->id, [
                'content' => HTML::link($category->url, $category->name),
                'children' =>  $this->getChildCategories($category)
            ]);

        }
    }



}