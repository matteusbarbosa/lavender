<?php
namespace App\Workflow\Forms\Backend\Entity\Product;

use App\Workflow\Forms\Backend\Entity;
use Illuminate\Database\Query\Expression;
use Lavender\Contracts\Entity as EntityContract;

class Categories extends Entity
{

    public $product;

    public function __construct($params)
    {
        $this->product = $params->entity;

        $this->options['action'] = url('backend/product/categories/'.$this->product->id);

        $selected = [];

        foreach($this->product->categories as $category){

            $selected[] = $category->id;

        }

        $this->addField('categories', [
            'label' => 'Category Tree',
            'type' => 'tree',
            'value' => $selected,
            'resource' => app('store')->root_category,
            'resource_helper' => function($resource, $test = false){
                if($resource instanceof EntityContract){
                    return $resource->children()->get([
                        'name as label',
                        new Expression('"categories" as name'),
                        'id as value',
                        'id as id',
                    ]);
                }
            }
        ]);

        parent::__construct($params);
    }

}