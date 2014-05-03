<?php

namespace Lavender\Pos\Cart;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Lavender\Catalog\Product;
use Lavender\Crm\User;
use Lavender\Pos\Cart;
use Lavender\Pos\Item as Item;
use Lavender\Pos\Cart\Item as Cart_Item;

class ItemSeeder extends Seeder
{

    public function run()
    {
        $this->command->info(PHP_EOL.'Add up to 5 random products to each cart.');
        Item::truncate();
        Cart_Item::truncate(); // @todo how to get cart_item to delete when item is deleted?
        foreach (User::all() as $user) {
            $cart = $user->cart;
            foreach (Product::all()->random(5) as $product) {
                $item = Item::create([
                    'product_id' => $product->id,
                    'user_id' => $user->id,
                ]);
                Cart_Item::create([
                    'cart_id' => $cart->id,
                    'item_id' => $item->id,
                ]);
            }
        }

    }

}
