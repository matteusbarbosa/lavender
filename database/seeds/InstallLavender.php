<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class InstallLavender extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// only run this seed if store doesn't exist
		if(!$this->container->store->exists){

			// create default store
			$store = entity('store')->fill([
				'default' => true,
			]);

			$store->save();

			// set the current store scope
			$this->container->store->setStore($store);

			// create default theme
			$theme = entity('theme')->fill([
				'code'  => 'default',
				'name'  => 'Default Theme',
			]);

			$theme->save();

			// create root category
			$category = entity('category')->fill([
				'name' => 'Root Category',
			]);

			$category->save();

			// update store
			$store->update([
				'theme'         => $theme,
				'root_category' => $category,
			]);

			// todo create admin (move back to artisan command)
			$success = false;

			while(!$success){

				$admin = entity('admin');

				$admin->email = $this->command->ask('Enter an email address: (required)');

				$admin->password = $this->command->secret('Enter a password: (required)');

				$admin->password_confirmation = $this->command->secret('Confirm your password: (required)');

				$success = $admin->save();

				if(!$success) $this->command->error($admin->errors);

			}

			$this->command->info("Lavender has successfully installed!");

		}
	}

}
