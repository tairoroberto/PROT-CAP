<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMidiaNoticia extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('midia_noticia', function(Blueprint $table) {
			$table->increments('id');
			$table->string('link');
			$table->text('text');
			$table->string('type');
            $table->string('type_video');
            $table->string('video_old_name');
            $table->string('image_old_name');
			$table->integer('id_noticia');
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
		Schema::drop('midia_noticia');
	}

}
