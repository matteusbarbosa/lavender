<?php
namespace App\Http\Controllers\Backend\Catalog;

use App\Http\Controller\BackendEntity;
use Illuminate\Http\Request;
use Lavender\Contracts\Entity;

class ProductController extends BackendEntity
{
	public function getEdit($id)
    {
        if($model = $this->validateEntity('product', $id)){

            $this->loadLayout();

            return view('backend.tabs')
                ->with('title', $model->getEntityName())
                ->with('tabs', [
                    [
                        'label' => "General",
                        'content' => workflow('edit_product', ['entity' => $model])
                    ],
                    [
                        'label' => "Categories",
                        'content' => workflow('edit_product_categories', ['entity' => $model])
                    ],
                ]);
        }

        return redirect('backend');
    }

	public function getIndex()
	{
        if($model = $this->validateEntity('product')){

            $columns =  [
                'Id'            => 'id',
                'Product Name'  => 'name',
                'Product Sku'   => 'sku',
                'Last Updated'  => 'updated_at'
            ];

            $this->loadLayout();

            return view('backend.grid')
                ->with('title',    'Product')
                ->with('edit_url', 'backend/product/edit')
                ->with('rows',      $model->all($columns))
                ->with('headers',   $this->tableHeaders($model, $columns));
        }

        return redirect('backend');
	}


    /**
     * Update a product model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postEdit(Request $request, $id)
    {
        if($model = $this->validateEntity('product', $id)){

            workflow('edit_product', ['entity' => $model])->handle($request->all());

        }

        return redirect()->back();
    }


    /**
     * Update product categories
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCategories(Request $request, $id)
    {
        if($model = $this->validateEntity('product', $id)){

            workflow('edit_product_categories', ['entity' => $model])->handle($request->all());

        }

        return redirect()->back();
    }

}