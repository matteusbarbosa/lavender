<?php

namespace Lavender\Pos;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Lavender\Crm\User;

class CartSeeder extends Seeder
{

    public function run()
    {
        $this->command->info(PHP_EOL.'Create a cart instance for all users.');
        Cart::whereNotNull('id')->delete();
        foreach (User::all() as $user) {
            Cart::create([
                'user_id' => $user->id,
            ]);
        }
    }

}
