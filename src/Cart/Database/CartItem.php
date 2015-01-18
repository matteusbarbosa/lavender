<?php
namespace Lavender\Cart\Database;

use Lavender\Entity\Database\Entity;

class CartItem extends Entity
{

    protected $entity = 'cart_item';

    protected $table = 'sales_cart_item';


}