<?php
namespace App\Http\Controllers\Catalog;

use App\Http\Controller\Frontend;
use Lavender\Support\Facades\Workflow;

class CategoryController extends Frontend
{

	public function __construct()
	{
        $this->loadLayout();
	}

	public function getIndex($category)
	{
        $category = entity('category')->findByAttribute('url', $category);

        $products = $category->products()->paginate(config('store.product_count'));

        return view('catalog.category.view')
            ->withCategory($category)
            ->withProducts($products);
	}

}
