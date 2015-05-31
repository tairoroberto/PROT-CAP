<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImagensBannerTv extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('imagens_banner_tv', function(Blueprint $table) {
			$table->increments('id');
			$table->string('image_path');
            $table->string('old_name');
            $table->integer('position');
			$table->integer('id_banner_tv');
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
		Schema::drop('imagens_banner_tv');
	}

}
