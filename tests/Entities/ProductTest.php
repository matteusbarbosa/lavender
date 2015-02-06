<?php
use Lavender\Support\Test;

class ProductTest extends Test
{


    public function test_instanceof_product()
    {
        $entity = entity('product');

        $this->assertInstanceOf('Lavender\Support\Contracts\EntityInterface', $entity);
    }


}