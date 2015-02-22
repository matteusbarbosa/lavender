<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controller\Backend;

class DashboardController extends Backend
{

	public function __construct()
	{
		$this->middleware('backend');

        $this->loadLayout();
	}

	public function getIndex()
	{
		return view('backend.dashboard');
	}

}