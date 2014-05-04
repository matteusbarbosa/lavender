<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeCartItem extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('cart_item', function($table) {
            $table->increments('id');
            $table->integer('cart_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('cart_item', function($table) {
            // cascade on delete to wipe out reference when item is deleted
            $table->foreign('item_id')->references('id')->on('item')->onDelete('cascade');
            $table->foreign('cart_id')->references('id')->on('cart')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('cart_item');
	}

}
