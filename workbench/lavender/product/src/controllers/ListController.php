<?php namespace Lavender\Product;

use Lavender\Core\Controller\BaseController;

class ListController extends BaseController
{

    protected $layout = 'product::default';


    public function getView($id)
    {
        $this->layout = \View::make('product::view');

        return $this->layout->with('id', $id);
    }


    public function getCollection($taxonomy)
    {
        return $this->layout->with('taxonomy', $taxonomy);
    }

}