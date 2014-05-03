<?php

namespace Lavender\Catalog\Product;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Lavender\Catalog\Product;

class ProductAttributeSeeder extends Seeder
{

    public function run()
    {
        $this->command->info(PHP_EOL.'Assign brand, qty, and price to all products.');
        ProductAttribute::truncate();
        $attributes = ['price' => [6,3,5], 'qty' => [99], 'brand' => ['acme','generic','commercial']];
        foreach (Product::all() as $product) {
            foreach($attributes as $code => $values){
                $attribute = Attribute::where('code', '=', $code)->firstOrFail();
                ProductAttribute::create([
                    'product_id' => $product->id,
                    'attribute_id' => $attribute->id,
                    'value' => $values[rand(0,count($values)-1)],
                ]);

            }
        }
    }

}
