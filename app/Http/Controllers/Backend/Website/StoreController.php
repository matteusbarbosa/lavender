<?php
namespace App\Http\Controllers\Backend\Website;

use App\Http\Controller\BackendEntity;

class StoreController extends BackendEntity
{

    //todo create new stores

	public function getIndex()
	{
        if($model = $this->validateEntity('store')){

            $columns =  [
                'Id'        => 'id',
                'Default'   => 'default',
            ];

            $this->loadLayout();

            return view('backend.grid')
                ->with('title',    'Stores')
                ->with('rows',      $model->all($columns))
                ->with('headers',   $this->tableHeaders($model, $columns));
        }

        return redirect('backend');
	}

}