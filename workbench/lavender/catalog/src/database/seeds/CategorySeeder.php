<?php

namespace Lavender\Catalog;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run()
    {
        $this->command->info(PHP_EOL.'Create 10 categories.');
        Category::truncate();
        for ($id = 1; $id < 11; $id++) {
            Category::create([
                'name' => 'Category #' . $id,
            ]);
        }
    }

}
