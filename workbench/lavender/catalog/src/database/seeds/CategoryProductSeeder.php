<?php namespace Lavender\Catalog;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryProductSeeder extends Seeder
{

    public function run()
    {
        $this->command->info(PHP_EOL.'Randomly assign up to 5 products to each category.');
        CategoryProduct::truncate();
        foreach (Category::all() as $category) {
            foreach (Product::all()->random(5) as $product) {
                CategoryProduct::create([
                    'category_id' => $category->id,
                    'product_id' => $product->id,
                ]);
            }
        }
    }

}
