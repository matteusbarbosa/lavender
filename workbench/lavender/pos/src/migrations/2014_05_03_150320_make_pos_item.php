<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakePosItem extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function($table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('user_id');
            $table->timestamps();
            // cascade on delete to wipe out item when product is deleted
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
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
        Schema::drop('item');
    }

}
