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
	}

}