<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLayoutNoticiaTv extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('layout_noticia_tv', function(Blueprint $table) {
			$table->increments('id');
			$table->string('width_main');
			$table->string('height_main');
			$table->string('show_title_main');
            $table->string('show_subtitle_main');
			$table->string('width_side');
			$table->string('height_side');
			$table->string('show_main');
			$table->string('show_side');
			$table->string('background_color');
			$table->string('color_background_path');
			$table->string('color_title');
			$table->string('color_title_path');
			$table->string('color_subtitle');
			$table->string('color_subtitle_path');
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
		Schema::drop('layout_noticia_tv');
	}

}
