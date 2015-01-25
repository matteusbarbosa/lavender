<?php
namespace Lavender\Catalog\Database;

use Lavender\Entity\Database\Entity;

class Product extends Entity
{

    protected $entity = 'product';

    protected $table = 'catalog_product';

    public $timestamps = true;

    public function getUrl()
    {
        return \URL::to(\Config::get('store.product_url') . '/' . $this->url);
    }

}