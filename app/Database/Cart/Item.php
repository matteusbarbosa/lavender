<?php
namespace App\Database\Cart;

use Lavender\Database\Entity;

class Item extends Entity
{

    protected $entity = 'cart_item';

    protected $table = 'sales_cart_item';


}