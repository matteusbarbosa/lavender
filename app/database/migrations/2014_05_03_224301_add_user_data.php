<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserData extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('user', function($table) {
            $table->string('email',250);
            $table->string('password',60);
            $table->string('remember_token',60);
            $table->string('firstname',250);
            $table->string('lastname',250);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('user', function($table) {
            $table->dropColumn('email');
            $table->dropColumn('password');
            $table->dropColumn('remember_token');
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
        });
	}

}
