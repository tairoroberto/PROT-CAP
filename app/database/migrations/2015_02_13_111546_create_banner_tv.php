<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBannerTv extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banner_tv', function(Blueprint $table) {
			$table->increments('id');
			$table->string('width');
			$table->string('height');
			$table->string('color_background');
			$table->string('color_background_path');
			$table->integer('time');
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
		Schema::drop('banner_tv');
	}

}
