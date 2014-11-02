<?php

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call('EntitySeeder');

        $this->command->info('Entity defaults have been seeded!');
    }

}