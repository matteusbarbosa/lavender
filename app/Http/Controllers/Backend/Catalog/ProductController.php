<?php
namespace App\Http\Controllers\Backend\Catalog;

use App\Http\Controller\BackendEntity;
use Illuminate\Http\Request;

class ProductController extends BackendEntity
{

    public function __construct()
    {
        $this->loadLayout();
    }

	public function getEdit($id)
    {
        if($model = $this->validateEntity('product', $id)){

            return view('backend.entity.view')
                ->with('model',     $model)
                ->with('workflow',  'edit_product');
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

            return view('backend.entity.list')
                ->with('entity',    'product')
                ->with('rows',      $model->all($columns))
                ->with('headers',   $this->tableHeaders($model, $columns));
        }

        return redirect('backend');
	}


    /**
     * Handle a login request to the application.
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

}