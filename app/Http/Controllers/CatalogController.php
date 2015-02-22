<?php
namespace App\Http\Controllers;

use App\Http\Controller\Frontend;
use Lavender\Support\Facades\Workflow;

class CatalogController extends Frontend
{

	public function __construct()
	{
        $this->loadLayout();
	}

	public function getCategory($category)
	{
        $category = entity('category')->findByAttribute('url', $category);

        $products = $category->products()->paginate(config('store.product_count'));

        return view('catalog.category.view')
            ->withCategory($category)
            ->withProducts($products);
	}

    public function getProduct($product)
    {
        $product = entity('product')->findByAttribute('url', $product);

        return view('catalog.product.view')
            ->withProduct($product);
    }

}
