<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('Lavender\Catalog\ProductSeeder');
        $this->call('Lavender\Catalog\CategorySeeder');
        $this->call('Lavender\Catalog\CategoryProductSeeder');
        $this->call('Lavender\Catalog\Product\AttributeSeeder');
        $this->call('Lavender\Catalog\Product\ProductAttributeSeeder');
	}

}