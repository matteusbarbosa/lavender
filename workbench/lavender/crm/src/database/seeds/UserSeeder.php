<?php

namespace Lavender\Crm;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{

    public function run()
    {
        $this->command->info(PHP_EOL.'Make a user table and create 10 users.');
        User::whereNotNull('id')->delete();
        for ($i = 1; $i < 11; $i++) {
            User::create([]);
        }
    }

}
