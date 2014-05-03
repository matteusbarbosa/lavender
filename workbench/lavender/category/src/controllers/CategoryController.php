<?php namespace Lavender\Category;

use Lavender\Core\Controller\BaseController;

class CategoryController extends BaseController
{

    protected $layout = 'category::default';

    public function getCategory($id)
    {
        return $this->layout->with('category', Category::find($id));
    }

}