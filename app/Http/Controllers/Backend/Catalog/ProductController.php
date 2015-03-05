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

            $tabs[] = [
                'label' => "General",
                'content' => workflow('edit_product', ['entity' => $model])
            ];

            if($model->exists){

                $tabs[] = [
                    'label'   => "Categories",
                    'content' => workflow('edit_product_categories', ['entity' => $model])
                ];

            }
            return view('backend.tabs')
                ->with('title', $model->getEntityName())
                ->with('tabs', $tabs);
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

            $new_button = url('backend/product/edit/new');

            compose_section(
                'backend.grid',
                'new_button',
                "<button onclick=\"window.location='{$new_button}';\">Add new product</button>"
            );

            compose_section(
                'backend.grid',
                'mass_actions',
                "<select><option>Action</option></select>"
            );

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

            $new = !$model->exists;

            workflow('edit_product', ['entity' => $model])->handle($request->all());

            if($new && $model->exists) return redirect()->to('backend/product/edit/'.$model->id);

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