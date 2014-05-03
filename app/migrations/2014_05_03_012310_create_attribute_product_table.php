<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('attribute_product', function($table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('attribute_id')->unsigned();
            $table->string('value', 50);
        });
        Schema::table('attribute_product', function($table) {
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->foreign('attribute_id')->references('id')->on('attribute')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('attribute_product');
	}

}
