<?php
namespace App\Workflow\Resources;

use Illuminate\Contracts\Support\Arrayable;

class CategoryTree implements Arrayable
{

    public function toArray()
    {
        $root = app('store')->root_category;

        return $this->values($root);
    }

    public function toChildren()
    {
        $root = app('store')->root_category;

        return $this->children($root);
    }


    protected function values($category)
    {
        return [
            'label'   => $category->name,
            'name'    => 'category',
            'value'   => $category->id,
            'children' => $this->children($category),
        ];
    }


    protected function children($category)
    {
        $results = [];

        foreach($category->children as $child){

            $results[] = $this->values($child);

        }

        return $results;
    }

}