<?php namespace Lavender\Cms;

use Cms;
use Lavender\Core\Controller\BaseController;

class DefaultController extends BaseController
{
	
	protected $layout = 'cms::default';
	
	/**
	 * Main entry point.
	 * 
	 * @return home page layout
	 */
    public function getIndex()
    {
        return \View::make('cms::home');
    }

    /**
     * CMS entry point.
     *
     * @return cms page layout
     */
    public function getCms($type = 'page', $id = null)
    {
        $cms = new Cms;
        if($cms->isAvailable($type)){
            if($id === null){
                // list cms items
                return \View::make("cms::{$type}.list")
                    ->withItems($cms->getList($type))
                    ->withType($type);
            }elseif($cms->isView($type, $id)){
                // view cms item
                return \View::make("cms::{$type}.view")
                    ->withItem($cms->getView($type, $id));
            }
        }
    }
	
}