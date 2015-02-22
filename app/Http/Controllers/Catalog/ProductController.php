<?php
namespace App\Http\Controllers\Catalog;

use App\Http\Controller\Frontend;
use Lavender\Support\Facades\Workflow;

class ProductController extends Frontend
{

	public function __construct()
	{
        $this->loadLayout();
	}

	public function getIndex($product)
	{
        $product = entity('product')->findByAttribute('url', $product);

        return view('catalog.product.view')
            ->withProduct($product);
	}

}
