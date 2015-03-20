<?php
namespace App\Http\Controllers;

use App\Http\Controller\Frontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ContactFormController extends Frontend
{

	public function __construct()
	{
        $this->loadLayout();
	}

	public function getIndex()
	{
		return view('contact.form');
	}

    public function postIndex(Request $request)
    {
        workflow('contact')->handle($request);

        return redirect('contact');
    }


}
