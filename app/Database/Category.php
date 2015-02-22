<?php
namespace App\Database;

use Lavender\Database\Entity;

class Category extends Entity
{

    protected $entity = 'category';

    protected $table = 'catalog_category';

    public $timestamps = true;

    public function getUrl()
    {
        return url(config('store.category_url') . '/' . $this->url);
    }

}