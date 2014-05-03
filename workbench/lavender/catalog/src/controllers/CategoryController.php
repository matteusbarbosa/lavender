<?php namespace Lavender\Catalog;

use Lavender\Core\Controller\BaseController;

class CategoryController extends BaseController
{

    protected $layout = 'catalog::category.default';


    public function getCategory($id)
    {
        return $this->layout->with('category', Category::find($id));
    }

}