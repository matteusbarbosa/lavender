<?php namespace Lavender\Product;

use Lavender\Core\Controller\BaseController;

class ProductController extends BaseController
{

    protected $layout = 'product::default';


    public function getProduct($id)
    {
        return $this->layout->with('product', $id);
    }

}