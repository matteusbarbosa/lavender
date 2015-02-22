<?php
namespace App\Http\Controllers\Backend\Catalog;

use App\Http\Controller\BackendEntity;

class CategoryController extends BackendEntity
{

    public function __construct()
    {
        $this->middleware('backend');

        $this->loadLayout();
    }

	public function getEdit($id)
    {
        if($model = $this->validateEntity('category', $id)){

            return view('backend.entity.view')
                ->with('model',     $model)
                ->with('workflow',  'edit_category')
                ->with('entity',    'category');
        }

        return redirect('backend');
    }

	public function getIndex()
	{
        if($model = $this->validateEntity('category')){

            $columns =  [
                'Id'            => 'id',
                'Category Name' => 'name',
                'Last Updated'  => 'updated_at'
            ];

            return view('backend.entity.list')
                ->with('entity',    'category')
                ->with('rows',      $model->whereNotNull('category_id')->get($columns))
                ->with('headers',   $this->tableHeaders($model, $columns));
        }

        return redirect('backend');
	}

}