<?php

namespace Lavender\Catalog\Product;

use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{

    public function run()
    {
        $this->command->info(PHP_EOL.'Create attributes: "brand", "qty", "price"');

        Attribute::truncate();
        Attribute::create([
            'code' => 'price',
            'label' => 'Price',
        ]);

        Attribute::create([
            'code' => 'qty',
            'label' => 'Qty',
        ]);

        Attribute::create([
            'code' => 'brand',
            'label' => 'Brand',
        ]);


    }

}
