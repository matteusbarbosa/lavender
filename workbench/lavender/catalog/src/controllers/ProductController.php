<?php

namespace Lavender\Catalog;

use Lavender\Core\Controller\BaseController;

class ProductController extends BaseController
{

    protected $layout = 'catalog::product.default';


    public function getProduct($id)
    {
        return $this->layout->with('product', Product::find($id));
    }

}