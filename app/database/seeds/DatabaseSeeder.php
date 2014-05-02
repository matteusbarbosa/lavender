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

		$this->call('Lavender\Product\ProductSeeder');
		$this->call('Lavender\Category\CategorySeeder');
	}

}