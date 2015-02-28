<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controller\Backend;

class WebsiteController extends Backend
{

    public function __construct()
    {
        $this->loadLayout();
    }

	public function getIndex()
	{
        return view('backend.website');
	}

}