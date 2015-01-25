<?php
namespace Lavender\Cart\Database;

use Lavender\Entity\Database\Entity;

class Cart extends Entity
{

    protected $entity = 'cart';

    protected $table = 'sales_cart';

}