<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controller\Backend;

class CatalogController extends Backend
{

    public function __construct()
    {
        $this->middleware('backend');

        $this->loadLayout();
    }

	public function getIndex()
	{
        return view('backend.catalog');
	}

}