<?php
namespace App\Http\Controllers;

use App\Http\Controller\Frontend;
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

    public function postIndex()
    {
        workflow('contact')->handle(Input::all());

        return redirect('contact');
    }


}
