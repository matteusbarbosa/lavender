<?php

namespace Lavender\Catalog;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

    public function run()
    {
        Product::truncate();
        for ($id = 1; $id < 11; $id++) {
            Product::create([
                'sku' => 'test-item-' . $id,
                'name' => 'Product #' . $id,
            ]);
        }
    }

}
