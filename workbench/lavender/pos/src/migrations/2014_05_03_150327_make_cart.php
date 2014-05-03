<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeCart extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('cart', function($table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('cart', function($table) {
            // cascade on delete to wipe out cart when user is deleted
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('cart');
	}

}
