<?php

namespace Lavender\Cms;

use Lavender\Core\Controller\BaseController;
use Lavender\Product;

class DefaultController extends BaseController
{

    protected $layout = 'layouts.default';



    public function getIndex()
    {

        return $this->layout;

    }
//        $collection = \App::make('product')->collection();
//        var_dump($collection->toSql());
//        foreach($collection as $item){
//            var_dump(['sku',$item->sku]);
//            var_dump(['name',$item->name]);
//        }
       // die();

//        echo \Lavender::getStore();
//        \Lavender::setStore('product');
//        echo \Lavender::getStore();
//        die();
//        $user = \Lavender::entity('product');
//        $user->name = 'John';
//
//        $user->save();






}