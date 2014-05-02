<?php namespace Lavender\Category;


use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run()
    {
        for($id = 1; $id < 11; $id++){
            Category::create([
                'name' => 'Category #'.$id,
            ]);
        }
    }

}


