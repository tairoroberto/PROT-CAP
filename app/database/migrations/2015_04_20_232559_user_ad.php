<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UserAd extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_ad', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
            $table->string('department');
            $table->string('company');
            $table->string('mail');
            $table->string('mobile');
            $table->string('telephonenumber');
            $table->string('pager');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_ad');
	}

}
