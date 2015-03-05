<?php
namespace App\Http\Controllers\Backend\Website;

use App\Http\Controller\Backend;
use Illuminate\Http\Request;

class ConfigController extends Backend
{

	public function getIndex()
	{
        $this->loadLayout();

        $tabs[] = [
            'label' => 'General',
            'content' => workflow('config_general')
        ];

        $tabs[] = [
            'label' => 'Account',
            'content' => workflow('config_account')
        ];

        return view('backend.tabs')
            ->with('title', 'Manage Config')
            ->with('tabs', $tabs);
	}


    /**
     * Update general config
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postIndex(Request $request)
    {
        workflow('config_general')->handle($request->all());

        return redirect()->back();
    }


    /**
     * Update account config
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postAccount(Request $request)
    {
        workflow('config_account')->handle($request->all());

        return redirect()->back();
    }

}