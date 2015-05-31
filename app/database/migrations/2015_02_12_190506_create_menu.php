<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenu extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menu', function(Blueprint $table) {
			$table->increments('id');
			$table->string('menu_color');
			$table->string('menu_selected_color');
			$table->string('menu_selected_color_path');
            $table->string('menu_titulo_color');
            $table->string('menu_titulo_color_path');
            $table->string('menu_font_color');
            $table->string('menu_font_color_path');
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
		Schema::drop('menu');
	}

}
