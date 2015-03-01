<?php
namespace App\Http\Controllers\Backend\Catalog;

use App\Http\Controller\BackendEntity;
use Illuminate\Http\Request;

class CategoryController extends BackendEntity
{

    public function __construct()
    {
        $this->loadLayout();
    }

	public function getEdit($id)
    {
        if($model = $this->validateEntity('category', $id)){

            return view('backend.tabs')
                ->with('title', $model->getEntityName())
                ->with('tabs', [
                    [
                        'label' => "General",
                        'content' => workflow('edit_category', ['entity' => $model]),
                    ]
                ]);
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

            return view('backend.grid')
                ->with('title',    'category')
                ->with('edit_url', 'backend/category/edit')
                ->with('rows',      $model->whereNotNull('category_id')->get($columns))
                ->with('headers',   $this->tableHeaders($model, $columns));
        }

        return redirect('backend');
	}


    /**
     * Update a category model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postEdit(Request $request, $id)
    {
        if($model = $this->validateEntity('category', $id)){

            workflow('edit_category', ['entity' => $model])->handle($request->all());

        }

        return redirect()->back();
    }

}